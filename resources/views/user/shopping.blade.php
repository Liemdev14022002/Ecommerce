@extends('user.layouts.template')

@section('title')
<title>Giỏ hàng</title>
@endsection

@section('content-main')
<div class="container-fluid mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <section class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb__text">
                                <h4>Giỏ hàng</h4>
                                <div class="breadcrumb__links">
                                    <a href="{{ route('user.home') }}">Trang chủ</a>
                                    <a href="{{ route('user.shopproduct') }}">Cửa hàng</a>
                                    <span>Giỏ hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="shopping-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="shopping__cart__table">
                                <form action="{{ route('user.updatetocard') }}" method="POST" id="update-cart-form">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Tổng cộng</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartItems as $item)
                                            <tr data-product-id="{{ $item['id'] }}">
                                                <td class="product__cart__item">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <div class="product__cart__item__pic mb-2">
                                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid">
                                                        </div>
                                                        <div class="product__cart__item__text text-center">
                                                            <h6>{{ $item['name'] }}</h6>
                                                            <h5>{{ number_format($item['price']) }} VND</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        <input type="hidden" name="cartItems[{{ $loop->index }}][product_id]" value="{{ $item['id'] }}">
                                                        <input type="number" name="cartItems[{{ $loop->index }}][quantity]" value="{{ $item['quantity'] }}" class="form-control" min="1">
                                                    </div>
                                                </td>
                                                <td class="cart__price">{{ number_format($item['total']) }} VND</td>
                                                
                                                <td class="cart__close">
                                                    <a href="{{ route('user.removetocard', $item['id']) }}" class="btn btn-danger">Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="continue__btn">
                                                <a href="{{ route('user.shopproduct') }}" class="btn btn-secondary">Tiếp tục mua sắm</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="continue__btn update__btn">
                                                <button type="submit" class="btn btn-secondary">Cập nhật giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__discount">
                                <h6>Mã giảm giá</h6>
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Mã giảm giá">
                                    <button type="submit" class="btn btn-primary mt-2">Áp dụng</button>
                                </form>
                            </div>
                            <div class="cart__total mt-3">
                                <h6>Tổng cộng giỏ hàng</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tạm tính
                                        <span>{{ number_format($totalPrice) }} VND</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tổng cộng
                                        <span>{{ number_format($totalPrice) }} VND</span>
                                    </li>
                                </ul>
                                <a href="{{route('user.CheckOutProducts')}}" class="primary-btn btn btn-primary mt-3">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<style>
    .product__cart__item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .product__cart__item__pic img {
        max-width: 100px;
    }

    .product__cart__item__text h6 {
        margin-top: 10px;
        font-size: 14px;
    }

    .product__cart__item__text h5 {
        font-size: 16px;
        color: #d9534f;
    }

    .cart__price, .cart__close i {
        font-size: 16px;
        color: #d9534f;
    }

    .cart__discount,
    .cart__total {
        margin-top: 20px;
    }

    .btn-link {
        color: #d9534f;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-link:hover {
        color: #c9302c;
    }
</style>
