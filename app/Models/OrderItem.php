<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    //OrderItem mối quan hệ với bảng sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    //End

    public function order()
    {
        return $this->belongsTo(Order::class);
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
