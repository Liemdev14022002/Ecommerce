<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //Hiển thị lên tất cả hóa đơn
    public function Index()
    {
        $orders = Order::all();
        return view('admin.allorders', compact('orders'));
    }
    //phương thức để xử lý yêu cầu AJAX và trả về danh sách các hóa đơn
    public function fetchOrders()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function ViewOrders($id)
    {
        // $order = Order::with('items')->findOrFail($id);
        // return view('admin.view_orders', compact('order'));
        $order = Order::with(['items.product'])->findOrFail($id);
        return view('admin.view_orders', compact('order'));
    }
    public function Delete($id){
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('allorders')->with('message', 'Hóa đơn đã được xóa thành công!');
    }
    public function PrintOrders($id)
    {
        $order = Order::with(['items.product'])->findOrFail($id);
        return view('admin.print', compact('order'));
    }
    

}
