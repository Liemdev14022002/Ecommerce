<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckOutSuccess()
    {
        return view('checkoutsuccess');
    }

    public function checkout(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'country' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postcode' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'payment_method' => 'required',
        'order_notes' => 'nullable|string',
    ]);

    // Tính tổng tiền từ giỏ hàng trong session
    $cart = $request->session()->get('cart');
    $total = array_reduce($cart, function($carry, $item) {
        return $carry + ($item['product_price'] * $item['quantity']);
    }, 0);

    $order = Order::create([
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
        'total' => $total,
    ]);

    foreach ($cart as $id => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $item['quantity'],
            'price' => $item['product_price'],
        ]);
    }

    $request->session()->forget('cart');
    return redirect()->route('checkout.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
}
}

// public function checkout(Request $request){
    //     $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'country' => 'required',
    //         'city' => 'required',
    //         'state' => 'required',
    //         'postcode' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required|email',
    //         'payment_method' => 'required',
    //         'order_notes' => 'nullable|string',
    //     ]);

    //     // Tính toán tổng số tiền từ giỏ hàng (hoặc từ session, request, ...)
    //     $cart = session()->get('cart'); // Lấy giỏ hàng từ session (hoặc từ request)

    //     $total = 0;
    //     foreach ($cart as $item) {
    //         $total += $item['product_price'] * $item['quantity'];
    //     }

    //     $order = Order::create([
    //         'first_name' => $request->input('first_name'),
    //         'last_name' => $request->input('last_name'),
    //         'country' => $request->input('country'),
    //         'city' => $request->input('city'),
    //         'state' => $request->input('state'),
    //         'postcode' => $request->input('postcode'),
    //         'phone' => $request->input('phone'),
    //         'email' => $request->input('email'),
    //         'payment_method' => $request->input('payment_method'),
    //         'order_notes' => $request->input('order_notes'),
    //         'total' => $total, // Lưu tổng số tiền vào đơn hàng
    //     ]);

    //     // Lưu chi tiết đơn hàng (OrderItem)
    //     foreach ($request->session()->get('cart') as $id => $item) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['product_price'],
    //         ]);
    //     }
    //     session()->forget('cart');
    //     return redirect()->route('checkout.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');

    //     // foreach ($request->session()->get('cart') as $id => $item) {
    //     //     $order->items()->create([
    //     //         'product_id' => $id,
    //     //         'quantity' => $item['quantity'],
    //     //         'price' => $item['product_price'],
    //     //     ]);
    //     // }

    //     // $request->session()->forget('cart');
    //     // return redirect()->route('checkout.success');
    // }