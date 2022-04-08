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
                <a href="{{ route('about') }}">Thông tin</a>
                <a href="{{ route('menu') }}">Thực đơn</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

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
        <main class="py-4">
            @yield('main');
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
                    <h3>our menu</h3>
                    <a href="#"><i class="fas fa-arrow-right"></i> pizza</a>
                    <a href="#"><i class="fas fa-arrow-right"></i> burger</a>
                    <a href="#"><i class="fas fa-arrow-right"></i> chicken</a>
                    <a href="#"><i class="fas fa-arrow-right"></i> pasta</a>
                    <a href="#"><i class="fas fa-arrow-right"></i> and more...</a>
                </div>

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
                    <h3>extra links</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my order</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my account</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my favorite</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> terms of use</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> privary policy</a>
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
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                </div>

                <div class="credit"> created <span>mr. web designer</span> | all rights reserved! </div>

            </div>

        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- link sj  -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
