<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartComposer
{
    public function compose(View $view)
    {
        $total = 0;

        // Kiểm tra người dùng có đăng nhập hay không
        if (Auth::check()) {
            // Lấy giỏ hàng từ cơ sở dữ liệu nếu người dùng đã đăng nhập
            $cart = Cart::where('user_id', Auth::id())->first();
            
            if ($cart) {
                // Lấy tất cả các mục trong giỏ hàng của người dùng
                $items = $cart->items; // Giả sử rằng bạn đã định nghĩa relationship 'items' trong model Cart

                // Tính tổng giá trị
                $total = $items->sum(function ($item) {
                    return $item->price * $item->quantity;
                });
            }
        } else {
            // Lấy giỏ hàng từ session nếu người dùng chưa đăng nhập
            $cart = session()->get('cart', []);
            $total = array_sum(array_map(function ($item) {
                return $item['product_price'] * $item['quantity'];
            }, $cart));
        }

        // Định dạng số tiền cho dễ đọc
        $formattedTotal = number_format($total, 0, ',', '.');

        $view->with('total', $formattedTotal);
    }
    // public function compose(View $view)
    // {
    //     $cart = session()->get('cart', []);
    //     $total = array_sum(array_map(function ($item) {
    //         return $item['product_price'] * $item['quantity'];
    //     }, $cart));

    //     // Định dạng số tiền cho dễ đọc
    //     $formattedTotal = number_format($total, 0, ',', '.');

    //     $view->with('total', $formattedTotal);
    // }

    // public function composelogin(View $view)
    // {
    //     // Lấy giỏ hàng của người dùng hiện tại
    //     $cart = Cart::where('user_id', Auth::id())->first();

    //     $total = 0;
    //     if ($cart) {
    //         $total = $cart->items()->sum('price * quantity');
    //     }

    //     // Định dạng số tiền cho dễ đọc
    //     $formattedTotal = number_format($total, 0, ',', '.');

    //     $view->with('total', $formattedTotal);
    // }
}
