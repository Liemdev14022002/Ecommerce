{{-- @extends('layouts.templatehome')

@section('title')
<title>Your Cart</title>
@endsection

@section('content')

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('shopproduct') }}">Shop</a>
                        <span>Shopping Cart</span>
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
                <form action="{{ route('updatecart') }}" method="POST">
                    @csrf
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ asset($details['product_img']) }}" alt="">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $details['product_name'] }}</h6>
                                                    <h5>{{ number_format($details['product_price'], 0, ',', '.') }} ₫</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="text" name="quantities[{{ $id }}]" value="{{ $details['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{ number_format($details['product_price'] * $details['quantity'], 0, ',', '.') }} ₫</td>
                                            <td class="cart__close">
                                                <form action="{{ route('removetocard') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <button type="submit" class="btn btn-link"><i class="fa fa-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('shopproduct') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="submit"><i class="fa fa-spinner"></i> Update cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>{{ number_format(session('cart') ? array_sum(array_column(session('cart'), 'product_price')) : 0, 0, ',', '.') }} ₫</span></li>
                        <li>Total <span>{{ number_format(session('cart') ? array_sum(array_map(function($item) { return $item['product_price'] * $item['quantity']; }, session('cart'))) : 0, 0, ',', '.') }} ₫</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection --}}


@extends('layouts.templatehome')

@section('title')
<title>Giỏ hàng</title>
@endsection

@section('content')

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Trang chủ</a>
                        <a href="{{ route('shopproduct') }}">Cửa hàng</a>
                        <span>Shopping Cart</span>
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
                    <table>
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Tổng Cộng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart') && count(session('cart')) > 0)
                                @foreach(session('cart') as $id => $details)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset($details['product_img']) }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $details['product_name'] }}</h6>
                                                <h5>{{ number_format($details['product_price'], 0, ',', '.') }} ₫</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="{{ $details['quantity'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ number_format($details['product_price'] * $details['quantity'], 0, ',', '.') }} ₫</td>
                                        <td class="cart__close">
                                            <form action="{{ route('removetocard') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button type="submit" class="btn btn-link"><i class="fa fa-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Giỏ hàng của bạn đang trống !</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if(session('cart') && count(session('cart')) > 0)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('shopproduct') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if(session('cart') && count(session('cart')) > 0)
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Mã giảm giá</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Tổng phụ <span>{{ number_format(session('cart') ? array_sum(array_column(session('cart'), 'product_price')) : 0, 0, ',', '.') }} ₫</span></li>
                            <li>Tổng cộng <span>{{ number_format(session('cart') ? array_sum(array_map(function($item) { return $item['product_price'] * $item['quantity']; }, session('cart'))) : 0, 0, ',', '.') }} ₫</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">Thanh Toán</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.getElementById('update-cart').addEventListener('click', function(e) {
        e.preventDefault();
        let quantities = {};
        document.querySelectorAll('.pro-qty-2 input').forEach(function(input) {
            let id = input.closest('tr').querySelector('input[name="id"]').value;
            quantities[id] = input.value;
        });

        fetch('{{ route('updatecart') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantities: quantities })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                location.reload();
            }
        });
    });
</script>
@endsection