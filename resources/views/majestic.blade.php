@extends('layouts.main')

@section('main')
    <section class="home" id="home">

        <div class="content">
            <span>Chào mừng bạn đến Majestic</span>
            <h3>với không gian và những hương vị đặc trưng sẽ khiến bạn không quên được khi đến nhà hàng 😋</h3>

            <a href="{{ route('menu') }}" class="btn">Đặt ngay</a>
        </div>

        <div class="image">
            <img src="images/home-img.png" alt="" class="home-img">
            <img src="images/home-parallax-img.png" alt="" class="home-parallax-img">
        </div>

    </section>
    <!-- home section ends  -->


    <!-- about section starts  -->
    <section class="about" id="about">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <span>why choose us?</span>
            <h3 class="title">what's make our food delicious!</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ut explicabo, numquam iusto est a ipsum
                assumenda tempore esse corporis?</p>
            <a href="#" class="btn">read more</a>
            <div class="icons-container">
                <div class="icons">
                    <img src="images/serv-1.png" alt="">
                    <h3>fast delivery</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-2.png" alt="">
                    <h3>fresh food</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-3.png" alt="">
                    <h3>best quality</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-4.png" alt="">
                    <h3>24/7 support</h3>
                </div>
            </div>
        </div>

    </section>
    <!-- about section ends -->

    <!-- food section starts  -->
    <section class="food" id="food">

        <div class="heading">
            <span>Popular dishes</span>
            <h3>our delicious food</h3>
        </div>

        <div class="swiper food-slider">

            <div class="swiper-wrapper">
                @foreach ($monan_db as $item)
                    <div class="swiper-slide slide">
                        <a href="{{ route('detail', [$item->id]) }}" class="text-decoration-none">

                            <img src="images/food-img-1.png" alt="">
                            <h3>{{ $item->tenmonan }}</h3>
                            <div class="price">{{ $item->gia }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- food section ends -->

    <!-- popular section starts  -->

    <section class="popular" id="popular">

        <div class="heading">
            <span>New food</span>
            <h3>our special dishes</h3>
        </div>

        <div class="box-container">
            @foreach ($monan_moi as $item)
                <div class="box">
                    {{-- <i class="tinhtrang">còn</i> --}}
                    <div class="image">
                        <img src="{{ asset('images/' . $item->hinhanh) }}" alt="" width="100px">
                    </div>
                    <div class="content">
                        <h3>{{ $item->tenmonan }}</h3>
                        <div class="price">{{ $item->gia }}/{{ $item->donvitinh }}</div>
                        {{-- <a href="{{ route('detail', [$item->id]) }}" class="btn">Chi tiết</a> --}}
                        <a href="{{ asset('cart/add/' . $item->id) }}" class="btn btn-primary">Them</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- popular section ends -->

    </div>
@endsection
