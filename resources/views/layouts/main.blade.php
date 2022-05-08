<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="{{ asset('images/majestic.png') }}" type="images/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    {{-- link CSS --}}
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' />


</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"> Laravel</a>

                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('majestic') }}">majestic</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guard('cus')->check())
                        <li>
                            <a href="{{ route('customer.profile') }}">Hé lô
                                {{ Auth::guard('cus')->user()->name }}</a>
                        </li>
                        <li>
                            <a href="{{ route('customer.logout') }}">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('customer.login') }}">Login </a>
                        </li>
                        <li>
                            <a href="{{ route('customer.register') }}">Register </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav> --}}
        <header class="header">
            <a href="{{ route('majestic') }}" class="logo"> <img src="{{ asset('images/majestic.png') }}">
                Majestic </a>

            <nav class="navbar">
                <a href="{{ route('majestic') }}">Trang chủ</a>
                {{-- <a href="{{ route('about') }}">Thông tin</a> --}}
                <a href="{{ route('menu') }}">Thực đơn</a>
                {{-- <a href="{{ route('showCart') }}">GHSS</a> --}}
                <a href="{{ route('cart.show') }}">GH</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
            </div>
            {{-- @php
                $khachhang_id = Session::get('id');
                if ($khachhang_id != null) {
                    // đã đăng nhập
                    echo '<a href="">Đăng xuất</a>';
                } else {
                    echo '<a href="">Login </a>';
                }
            @endphp --}}

            <ul class="nav navbar-nav navbar-right">
                @if (Session::get('id') != null)
                    <li>
                        <a href="">Hé lô
                            {{ Session::get('tenkh') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout_kh') }}">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login_checkout') }}">Login </a>
                    </li>
                    <li>
                        <a href="{{ route('register_checkout') }}">Register </a>
                    </li>
                @endif
            </ul>
            {{-- <ul class="nav navbar-nav navbar-right">
                @if (Auth::guard('cus')->check())
                    <li>
                        <a href="{{ route('customer.profile') }}">Hé lô
                            {{ Auth::guard('cus')->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('customer.login') }}">Login </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.register') }}">Register </a>
                    </li>
                @endif
            </ul> --}}

        </header>

        <section class="search-form-container">
            <form action="{{ route('search') }}" method="GET">
                <input type="search" name="timkiem" placeholder="search here..." id="search-box">
                <button type="submit" for="search-box"><i class="fas fa-search"></i></button>
            </form>

        </section>

        <!-- shopping-cart section  -->

        {{-- <section class="shopping-cart-container">

            <div class="products-container">

                <h3 class="title">your products</h3>

                <div class="box-container">

                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="images/menu-1.png" alt="">
                        <div class="content">
                            <h3>delicious food</h3>
                            <span> quantity : </span>
                            <input type="number" name="" value="1" id="">
                            <br>
                            <span> note : </span>
                            <span class="price"> abc </span>
                            <br>
                            <span> price : </span>
                            <span class="price"> $40.00 </span>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="images/menu-2.png" alt="">
                        <div class="content">
                            <h3>delicious food</h3>
                            <span> quantity : </span>
                            <input type="number" name="" value="1" id="">
                            <br>
                            <span> note : </span>
                            <span class="price"> abc </span>
                            <br>
                            <span> price : </span>
                            <span class="price"> $40.00 </span>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="images/menu-3.png" alt="">
                        <div class="content">
                            <h3>delicious food</h3>
                            <span> quantity : </span>
                            <input type="number" name="" value="1" id="">
                            <br>
                            <span> note : </span>
                            <span class="price"> abc </span>
                            <br>
                            <span> price : </span>
                            <span class="price"> $40.00 </span>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="images/menu-4.png" alt="">
                        <div class="content">
                            <h3>delicious food</h3>
                            <span> quantity : </span>
                            <input type="number" name="" value="1" id="">
                            <br>
                            <span> note : </span>
                            <span class="price"> abc </span>
                            <br>
                            <span> price : </span>
                            <span class="price"> $40.00 </span>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="images/menu-5.png" alt="">
                        <div class="content">
                            <h3>delicious food</h3>
                            <span> quantity : </span>
                            <input type="number" name="" value="1" id="">
                            <br>
                            <span> note : </span>
                            <span class="price"> abc </span>
                            <br>
                            <span> price : </span>
                            <span class="price"> $40.00 </span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="cart-total">

                <h3 class="title"> cart total </h3>

                <div class="box">

                    <h3 class="subtotal"> subtotal : <span>$200</span> </h3>
                    <h3 class="total"> total : <span>$200</span> </h3>

                    <a href="#" class="btn">proceed to checkout</a>

                </div>

            </div>

        </section> --}}

        <!-- login-form  -->

        {{-- <div class="login-form-container">

            <form action="">
                <h3>login form</h3>
                <input type="email" name="" placeholder="enter your email" id="" class="box">
                <input type="password" name="" placeholder="enter your password" id="" class="box">
                <div class="remember">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me">remember me</label>
                </div>
                <input type="submit" value="login now" class="btn">
                <p>forget password? <a href="#">click here</a></p>
                <p>don't have an account? <a href="#">create one</a></p>
            </form>

        </div> --}}

        <main class="py-4">
            @yield('main')
        </main>

        <section class="footer">

            <div class="newsletter">
                <h3>newsletter</h3>
                <form action="">
                    <input type="email" name="" placeholder="enter your email" id="">
                    <input type="submit" value="subscribe">
                </form>
            </div>

            <div class="box-container">

                <div class="box">
                    <h3>quick links</h3>
                    <a href="#majestic"> <i class="fas fa-arrow-right"></i> majestic</a>
                    <a href="#about"> <i class="fas fa-arrow-right"></i> about</a>
                    <a href="#popular"> <i class="fas fa-arrow-right"></i> popular</a>
                    <a href="#menu"> <i class="fas fa-arrow-right"></i> menu</a>
                    <a href="#order"> <i class="fas fa-arrow-right"></i> order</a>
                    <a href="#blogs"> <i class="fas fa-arrow-right"></i> blogs</a>
                </div>

                <div class="box">
                    <h3>opening hours</h3>
                    <p>monday : 7:00am to 10:00pm</p>
                    <p>tuesday : 7:00am to 10:00pm</p>
                    <p>wednesday : 7:00am to 10:00pm</p>
                    <p>friday : 7:00am to 10:00pm</p>
                    <p>saturday and sunday closed</p>
                </div>

            </div>

            <div class="bottom">

                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-github"></a>
                </div>

                <div class="credit"> Được tạo bởi <span>Lê Minh Long</span></div>

            </div>

        </section>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- link sj  -->
    <script src="{{ asset('js/script.js') }}"></script>

    @yield('js')
</body>

</html>
