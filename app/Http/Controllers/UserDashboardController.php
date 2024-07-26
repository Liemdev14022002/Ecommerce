<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Lấy số lượng đơn hàng của người dùng
        $ordersCount = Order::where('user_id', $userId)->count();
        // $pendingOrdersCount = Order::where('user_id', $userId)
        //     ->where('status', 'pending')
        //     ->count();

        // Lấy số lượng sản phẩm trong giỏ hàng của người dùng
        $cartItemsCount = Cart::where('user_id', $userId)->count();

        // Truyền dữ liệu này đến view
        return view('user.dashboard', compact('ordersCount', 'cartItemsCount'));
    }
    //Hàm hủy phiên, đăng xuất ứng dụng 
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function shopping()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = [];
        $totalPrice = 0;

        if ($cart) {
            $cartItems = $cart->items->map(function($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->product->product_name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'image' => $item->product->product_img,
                    'total' => $item->price * $item->quantity
                ];
            });
            $totalPrice = $cart->total;
        }

        return view('user.shopping', compact('cartItems', 'totalPrice'));
    }
    public function home()
    {
        return view('user.home');
    }
    public function ShopProduct()
    {
        $allproducts = Product::latest()->paginate(5);
        $categories = Category::all();
        return view('user.shop',compact('allproducts','categories'));
    }
    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $category_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$category_id)->latest()->get();
        return view('user.shop-details',compact('product','related_products'));
    }
    public function ShopCategory($id, $lug)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        $categories = Category::all();
        return view('user.shopcategory', compact('products', 'category','categories'));
    }

    public function Infor()
    {
        $user = Auth::user();

        $order = Order::where('user_id', $user->id)->first();
        $userData = $order ? $order : $user;
        return view('user.inforuser', compact('userData'));
    }
    //Phương thức thêm sản phẩm vào giỏ hàng khi người dùng đã đăng nhập
    public function AddToCard(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->product_price,
                'image' => $product->product_img
            ]);
        }

        $total = CartItem::where('cart_id', $cart->id)->sum(DB::raw('quantity * price'));
        $cart->update(['total' => $total]);
        return redirect()->route('user.shopping')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function UpdateToCard(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        foreach ($request->cartItems as $cartItem) {
            $item = CartItem::find($cartItem['product_id']);
            if ($item) {
                $item->quantity = $cartItem['quantity'];
                $item->save();
            }
        }

        // Cập nhật lại tổng số tiền trong giỏ hàng
        $total = CartItem::where('cart_id', $cart->id)->sum(DB::raw('quantity * price'));
        $cart->update(['total' => $total]);

        return redirect()->route('user.shopping')->with('success', 'Giỏ hàng đã được cập nhật');
    }

    public function RemoveToCard($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cart = $cartItem->cart;

        $cartItem->delete();

        if ($cart->items()->count() === 0) {
            $cart->delete();
        } else {
            $total = $cart->items()->sum(DB::raw('quantity * price'));
            $cart->update(['total' => $total]);
        }

        return redirect()->route('user.shopping')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
    //Cập nhật thông tin của người dùng 
    public function UpdateInfor(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);
    
        $user = Auth::user();
    
        // Cập nhật thông tin trong bảng users
        $user->update($request->only(['first_name', 'last_name', 'phone', 'address']));
    
        // Cập nhật hoặc tạo mới thông tin trong bảng orders
        $order = Order::updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['first_name', 'last_name', 'country', 'city', 'state', 'postcode', 'phone', 'address'])
        );
    
        return redirect()->back()->with('success', 'Thông tin tài khoản đã được cập nhật thành công.');
    }
    //Hiển thị nên trang thanh toán
    public function CheckOutProducts()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartItems = [];
        $totalPrice = 0;

        if ($cart) {
        $cartItems = $cart->items->map(function($item) {
            return [
                'name' => $item->product->product_name,
                'quantity' => $item->quantity,
                'total' => $item->price * $item->quantity
            ];
        });
        $totalPrice = $cart->total;
        }

        $order = Order::where('user_id', $user->id)->first();
        $userData = $order ? $order : $user;

        return view('user.checkoutforlogin', compact('userData', 'cartItems', 'totalPrice'));
    }
    public function CheckOutProductsComplete(Request $request){
        $user = Auth::user();

    // Lấy giỏ hàng của người dùng
    $cart = Cart::where('user_id', $user->id)->first();

    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->route('user.shopping')->with('error', 'Giỏ hàng của bạn đang trống.');
    }

    // Bắt đầu giao dịch
    DB::beginTransaction();

    try {
        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $user->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'payment_method' => $request->input('payment_method'),
            'order_notes' => $request->input('order_notes'),
            'total' => $cart->total,
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cart->items as $item) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        $cart->items()->delete();
        $cart->delete();

        // Commit giao dịch
        DB::commit();

        return redirect()->route('user.checkoutsuccsess')->with('success', 'Bạn đã đặt hàng thành công!');
    } catch (\Exception $e) {
        // Rollback giao dịch nếu có lỗi
        DB::rollBack();

        return redirect()->route('user.shopping')->with('error', 'Đã xảy ra lỗi khi đặt hàng. Vui lòng thử lại.');
    }
    }
    public function checkoutsuccsess(){
        return view('user.checkoutsuccess');
    }
    public function showorders(){
        $orders = Order::where('user_id', Auth::id())->with('items')->get();
        return view('user.showorders', compact('orders'));
    }
    public function destroyOrder($id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->first();

        if ($order) {
            DB::beginTransaction();
            try {
                $order->items()->delete();
                $order->delete();

                DB::commit();
                return redirect()->route('user.showorders')->with('success', 'Đơn hàng đã được xóa.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('user.showorders')->with('error', 'Đã xảy ra lỗi khi xóa đơn hàng.');
            }
        } else {
            return redirect()->route('user.showorders')->with('error', 'Không tìm thấy đơn hàng.');
        }
    }
}
