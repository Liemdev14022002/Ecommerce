{{-- @extends('user.layouts.template')

@section('title')
<title>Lịch sử mua hàng</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Lịch sử mua hàng</h4>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p>Bạn chưa có đơn hàng nào.</p>
                    @else
                        @foreach ($orders as $order)
                            <div class="card mb-3">
                                <div class="card-header">
                                    Đơn hàng #{{ $order->id }} - Ngày đặt: {{ $order->created_at }}
                                    <form action="{{ route('user.destroyOrder', $order->id) }}" method="POST" class="float-right" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($order->items as $item)
                                            <li class="list-group-item">
                                                Sản phẩm: {{ $item->product->product_name }} - Số lượng: {{ $item->quantity }} - Giá: {{ $item->price }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="mt-3">Tổng: {{ $order->total }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
{{-- @extends('user.layouts.template')

@section('title')
<title>Lịch sử mua hàng</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Lịch sử mua hàng</h4>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p>Bạn chưa có đơn hàng nào.</p>
                    @else
                        @foreach ($orders as $order)
                            <div class="card mb-3">
                                <div class="card-header">
                                    Đơn hàng #{{ $order->id }} - Ngày đặt: {{ $order->created_at }}
                                    <form action="{{ route('user.destroyOrder', $order->id) }}" method="POST" class="float-right" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($order->items as $item)
                                            <li class="list-group-item">
                                                Sản phẩm: {{ $item->product->product_name }} - Số lượng: {{ $item->quantity }} - Giá: {{ number_format($item->price, 0, ',', '.') }} đ
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="mt-3">Tổng: {{ number_format($order->total, 0, ',', '.') }} đ</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('user.layouts.template')

@section('title')
<title>Lịch sử mua hàng</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Lịch sử mua hàng</h4>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p>Bạn chưa có đơn hàng nào.</p>
                    @else
                        @foreach ($orders as $order)
                            <div class="card mb-3">
                                <div class="card-header">
                                    Đơn hàng #{{ $order->id }} - Ngày đặt: {{ $order->created_at }}
                                    <form action="{{ route('user.destroyOrder', $order->id) }}" method="POST" class="float-right" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($order->items as $item)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="{{ asset($item->product->product_img) }}" alt="{{ $item->product->product_name }}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>Sản phẩm: {{ $item->product->product_name }}</p>
                                                        <p>Số lượng: {{ $item->quantity }}</p>
                                                        <p>Giá: {{ number_format($item->price, 0, ',', '.') }} đ</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="mt-3">Tổng: {{ number_format($order->total, 0, ',', '.') }} đ</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection