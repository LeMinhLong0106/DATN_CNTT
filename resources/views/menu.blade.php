@extends('layouts.main')

@section('main')
    <!-- start menu -->
    <section class="sidenav">
        <nav class="nav__container">
            <div>
                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>
                        @foreach ($data as $item)
                            <a href="#{{ $item->id }}" class="nav__link">
                                <span class="nav__name">{{ $item->tendm }}</span>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </nav>
    </section>

    <!-- end menu -->
    @foreach ($data as $item)
        <section class="popular" id="{{ $item->id }}">
            <div>
                <h3>{{ $item->tendm }}</h3>
                <div class="box-container">
                    
                    @foreach ($monans as $ma)
                        @if ($ma->danhmuc == $item->id)
                            <div class="box">
                                <div class="image">
                                    <img src="{{ asset('images/' . $ma->hinhanh) }}" alt="" >
                                </div>
                                <div class="content">
                                    <h3>{{ $ma->tenmonan }}</h3>
                                    <div class="price">{{ $ma->gia }}/{{ $ma->donvitinh }}</div>
                                    <a href="{{ route('detail', [$item->id]) }}" class="btn">Chi tiết</a>

                                    {{-- <a href="#" data-url="{{ route('addToCart', [$ma->id]) }}"
                                        class="btn btn-primary add_to_cart">Them gio</a> --}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
    </div>
@endsection
@section('js')
    <script>
        function addToCart(e) {
            e.preventDefault();
            let urlCard = $(this).data('url');
            // alert(urlCard);
            $.ajax({
                url: urlCard,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        alert('Thêm giỏ hàng thành công');
                    } else {
                        alert('Thêm giỏ hàng thất bại');
                    }
                },
                error: function(data) {}
            });
        };

        $(function() {
            $('.add_to_cart').on('click', addToCart);
        });
    </script>
@endsection
