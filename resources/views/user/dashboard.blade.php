{{-- @extends('user.layouts.template')

@section('title')
<title>Trang chủ tài khoản</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')
        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Bảng điều khiển</h4>
                </div>
                <div class="card-body">
                    <p>Chào mừng bạn, {{ Auth::user()->name }}!</p>
                    <p>Đây là bảng điều khiển của bạn, nơi bạn có thể quản lý các thông tin cá nhân và đơn hàng của mình.</p>
                    
                    <!-- Thêm các thông tin cần thiết như số đơn hàng gần đây, trạng thái giỏ hàng, v.v. -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Đơn hàng gần đây</div>
                                <div class="card-body">
                                    <h5 class="card-title">3</h5>
                                    <p class="card-text">Đơn hàng đang chờ xử lý</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Giỏ hàng</div>
                                <div class="card-body">
                                    <h5 class="card-title">5</h5>
                                    <p class="card-text">Sản phẩm trong giỏ hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">Thông báo</div>
                                <div class="card-body">
                                    <h5 class="card-title">2</h5>
                                    <p class="card-text">Thông báo mới</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('user.layouts.template')

@section('title')
<title>Trang chủ tài khoản</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')
        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Bảng điều khiển</h4>
                </div>
                <div class="card-body">
                    <p>Chào mừng bạn, {{ Auth::user()->name }}!</p>
                    <p>Đây là bảng điều khiển của bạn, nơi bạn có thể quản lý các thông tin cá nhân và đơn hàng của mình.</p>
                    
                    <!-- Thêm các thông tin cần thiết như số đơn hàng gần đây, trạng thái giỏ hàng, v.v. -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Đơn hàng gần đây</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $ordersCount }}</h5>
                                    <p class="card-text">Đơn hàng đang chờ xử lý</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Giỏ hàng</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cartItemsCount }}</h5>
                                    <p class="card-text">Sản phẩm trong giỏ hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">Thông báo</div>
                                <div class="card-body">
                                    <h5 class="card-title">2</h5>
                                    <p class="card-text">Thông báo mới</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
