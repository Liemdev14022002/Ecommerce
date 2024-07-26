@php
    $categories = App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title')

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('dashuser/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashuser/css/privatecss.css')}}" type="text/css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{asset('dashuser/img/icon/search.png')}}" alt=""></a>
            <a href="#"><img src="{{asset('dashuser/img/icon/heart.png')}}" alt=""></a>
            <a href="#"><img src="{{asset('dashuser/img/icon/cart.png')}}" alt=""> <span>0</span></a>
            <div class="price" id="price">₫</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-md-5">
                        <h5 style="color: white; float:right;">Welcome {{Auth::user()->name}}</h5>     
                    </div>
    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{asset('dashuser/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('user.home') }}">Trang Chủ</a></li>
                            <li><a href="{{route('user.shopproduct')}}">Cửa Hàng</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                    <li><a href="{{route('user.shopcategory',[$category->id,$category->slug] )}}">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="{{route('user.dashboard')}}">Thông tin tài khoản</a></li>
                        </ul>
                    </nav>
                </div>

                <style>
                    .header__nav__option .price {
  line-height: 30px; /* Căn chỉnh giá tiền theo chiều dọc với biểu tượng giỏ hàng */
  vertical-align: middle; /* Căn chỉnh giá tiền theo chiều dọc (tùy chọn) */
  margin-left: -10px; /* Thêm khoảng cách bên trái cho giá tiền (tùy chọn) */
}
                </style>

                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{asset('dashuser/img/icon/search.png')}}" alt=""></a>
                    <a href="#"><img src="{{asset('dashuser/img/icon/heart.png')}}" alt=""></a>
                    <a href="{{route('user.shopping')}}"><img src="{{asset('dashuser/img/icon/cart.png')}}" alt=""> <span></span></a>
                    <div class="price" id="price">{{ $total }}₫</div>
                </div>

                {{-- <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{asset('dashuser/img/icon/search.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('dashuser/img/icon/heart.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('dashuser/img/icon/cart.png')}}" alt=""> <span>0</span></a>
                        <div class="price" id="price">150.000₫</div>
                    </div>
                </div> --}}
                
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    @yield('content-main')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{asset('dashuser/img/footer-logo.png')}}" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{asset('dashuser/img/payment.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    
    <script src="{{asset('dashuser/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('dashuser/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashuser/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('dashuser/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('dashuser/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('dashuser/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('dashuser/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('dashuser/js/mixitup.min.js')}}"></script>
    <script src="{{asset('dashuser/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dashuser/js/main.js')}}"></script>
</body>

</html>