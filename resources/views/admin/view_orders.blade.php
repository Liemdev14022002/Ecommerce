@extends('admin.layout.template')

@section('title')
    <title>Chi Tiết Hóa Đơn</title>
@endsection

@section('content')
<div class="container">
    <a href="{{ route('allorders') }}" class="btn btn-primary mb-3">Quay lại</a>
    <h1>Chi Tiết Hóa Đơn</h1>
    <div class="order-details">
        <p><strong>Tên:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p><strong>Quốc gia:</strong> {{ $order->country }}</p>
        <p><strong>Thành phố:</strong> {{ $order->city }}</p>
        <p><strong>Bang/Tỉnh:</strong> {{ $order->state }}</p>
        <p><strong>Mã bưu điện:</strong> {{ $order->postcode }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
        <p><strong>Ghi chú:</strong> {{ $order->order_notes }}</p>
        <p><strong>Tổng cộng:</strong> {{ number_format($order->total, 0, ',', '.') }} ₫</p>
    </div>

    <h2>Danh Sách Sản Phẩm</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
