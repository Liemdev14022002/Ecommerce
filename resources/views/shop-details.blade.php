@extends('layouts.templatehome')

@section('title')
<title>Chi tiết sản phẩm</title>
@endsection

@section('content')
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('shopproduct') }}">Shop</a>
                        <span>{{ $product->product_name }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($product->productImages as $index => $image)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab" href="#tabs-{{ $index + 1 }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset($image->image_path) }}"></div>
                                </a>
                            </li>
                        @endforeach

                        @foreach($product->productVideos as $index => $video)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-{{ $index + count($product->productImages) + 1 }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset('dashuser/img/shop-details/thumb-4.png') }}">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        @foreach($product->productImages as $index => $image)
                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="tabs-{{ $index + 1 }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset($image->image_path) }}" alt="Product Image">
                                </div>
                            </div>
                        @endforeach

                        @foreach($product->productVideos as $index => $video)
                            <div class="tab-pane" id="tabs-{{ $index + count($product->productImages) + 1 }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{ $product->product_name }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3>{{ number_format($product->product_price, 0, ',', '.') }} ₫</h3>
                        <p>{{ $product->product_short_description }}</p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="xxl">xxl
                                    <input type="radio" id="xxl">
                                </label>
                                <label class="active" for="xl">xl
                                    <input type="radio" id="xl">
                                </label>
                                <label for="l">l
                                    <input type="radio" id="l">
                                </label>
                                <label for="sm">s
                                    <input type="radio" id="sm">
                                </label>
                            </div>
                            <div class="product__details__option__color">
                                <span>Color:</span>
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                                <label class="c-2" for="sp-2">
                                    <input type="radio" id="sp-2">
                                </label>
                                <label class="c-3" for="sp-3">
                                    <input type="radio" id="sp-3">
                                </label>
                                <label class="c-4" for="sp-4">
                                    <input type="radio" id="sp-4">
                                </label>
                                <label class="c-9" for="sp-9">
                                    <input type="radio" id="sp-9">
                                </label>
                            </div>
                        </div>
                        <!--Làm tính năng thêm sản phảm vào giỏ hàng-->
                        {{-- <form action="{{route('addtocard')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">add to cart</button>
                            </div>
                        </form>                         --}}
                        <form action="{{route('addtocard')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">add to cart</button>
                            </div>
                        </form>
                        

                        <!--End-->
                        <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> add to compare</a>
                        </div>
                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="{{ asset('dashuser/img/shop-details/details-payment.png') }}" alt="">
                            <ul>
                                <li><span>SKU:</span> 3812912</li>
                                <li><span>Categories:</span> Clothes</li>
                                <li><span>Tag:</span> Clothes, Skin, Body</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Thông Tin</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    {{ $product->product_long_description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Sản Phẩm Liên Quan</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($related_products as $related_product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                            <img src="{{ asset($related_product->product_img) }}" alt="{{ $related_product->product_name }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('dashuser/img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('dashuser/img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{ asset('dashuser/img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $related_product->product_name }}</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{ number_format($related_product->product_price, 0, ',', '.') }} ₫</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                        <a href="{{ route('singleproduct', [$related_product->id, $related_product->slug]) }}" class="see-more">See More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
