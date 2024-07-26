@extends('layouts.templatehome')

@section('title')
<title>Checkout</title>
@endsection

@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh Toán</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}">Trang Chủ</a>
                        <a href="{{ url('/shop') }}">Cửa Hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code</h6>
                        <h6 class="checkout__title">Chi tiết thanh toán</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" required>
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" required>
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" required>
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="postcode" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <input type="text" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đặt hàng của bạn</h4>
                            <div class="checkout__order__products">Sản Phẩm <span>Tổng cộng</span></div>

                            <ul class="checkout__total__products">
                                @foreach ($cart as $id => $item)
                                    <li>{{ $item['product_name'] }} x {{ $item['quantity'] }} <span>{{ number_format($item['product_price'] * $item['quantity'], 0, ',', '.') }} ₫</span></li>
                                @endforeach
                            </ul>

                            <ul class="checkout__total__all">
                                <li>Tổng phụ <span>{{ number_format(array_sum(array_map(function($item) { return $item['product_price'] * $item['quantity']; }, $cart)), 0, ',', '.') }} ₫</span></li>
                                <li>Tổng cộng <span>{{ number_format(array_sum(array_map(function($item) { return $item['product_price'] * $item['quantity']; }, $cart)), 0, ',', '.') }} ₫</span></li>
                            </ul>

                            <div class="checkout__input__checkbox">
                                <label for="payment_cod">
                                    Thanh toán khi nhận hàng
                                    <input type="radio" id="payment_cod" name="payment_method" value="cod" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="payment_direct">
                                    Thanh toán chuyển khoản
                                    <input type="radio" id="payment_direct" name="payment_method" value="direct_payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection