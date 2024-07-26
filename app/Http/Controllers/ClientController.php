<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Index()
    {
        $products = Product::with('productImages','productVideos')->get();
        return view('welcome',compact('products'));
    }
    public function About()
    {
        return view('about_us');
    }
    public function ShopProduct()
    {
        $allproducts = Product::latest()->paginate(5);
        $categories = Category::all();
        return view('shop',compact('allproducts','categories'));
    }
    public function CategoryProducts($id, $slug)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        $categories = Category::all();
        return view('shopcategory', compact('products', 'category','categories'));
    }
    public function SingleProduct($id)
    {
        // $product = Product::findOrFail($id);
        // $category_id = Product::where('id',$id)->value('product_subcategory_id');
        // $related_products = Product::where('product_subcategory_id',$category_id)->latest()->get();
        // return view('shop-details',compact('product','related_products'));

        $product = Product::findOrFail($id);
        $category_id = $product->product_subcategory_id;

        // Tải các mối quan hệ
        $product->load('productImages', 'productVideos');

        $related_products = Product::where('product_subcategory_id', $category_id)->latest()->get();

        return view('shop-details', compact('product', 'related_products'));
    }
    public function AddToCard(Request $request)
{
    // Tìm sản phẩm bằng product_id từ request
    $product = Product::find($request->product_id);

    // Nếu không tìm thấy sản phẩm, trả về lỗi
    if (!$product) {
        return redirect()->route('shopproduct')->with('error', 'Product not found.');
    }

    // Lấy giỏ hàng hiện tại từ session
    $cart = session()->get('cart', []);

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
    if (isset($cart[$product->id])) {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $cart[$product->id]['quantity'] += $request->quantity;
    } else {
        // Thêm sản phẩm vào giỏ hàng
        $cart[$product->id] = [
            "product_name" => $product->product_name,
            "quantity" => $request->quantity,
            "product_price" => $product->product_price,
            "product_img" => $product->product_img
        ];
    }

    // Lưu giỏ hàng vào session
    session()->put('cart', $cart);

    // Trả về với thông báo thành công
    return redirect()->route('shopproduct')->with('success', 'Product added to cart successfully!');
}
public function ViewCard()
{
    $cart = session()->get('cart', []);
    return view('cart', compact('cart'));
}

    public function RemoveToCard(Request $request)
    {
    if ($request->id) {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        // Nếu giỏ hàng trống sau khi xóa, xóa luôn session 'cart'
        if (empty($cart)) {
            session()->forget('cart');
        }

        return redirect()->route('viewcard')->with('success', 'Product removed successfully!');
    }
    }


//     public function UpdateCart(Request $request)
// {
//     if($request->quantities) {
//         $cart = session()->get('cart');
        
//         foreach($request->quantities as $id => $quantity) {
//             if(isset($cart[$id])) {
//                 $cart[$id]['quantity'] = $quantity;
//             }
//         }
        
//         session()->put('cart', $cart);
        
//         return redirect()->route('viewcard')->with('success', 'Cart updated successfully!');
//     }
// }

public function UpdateCart(Request $request)
{
    if($request->quantities) {
        $cart = session()->get('cart');
        
        foreach($request->quantities as $id => $quantity) {
            if(isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        
        session()->put('cart', $cart);
        
        return redirect()->route('viewcard')->with('success', 'Cart updated successfully!');
    }
}

    public function CheckOut()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }
}