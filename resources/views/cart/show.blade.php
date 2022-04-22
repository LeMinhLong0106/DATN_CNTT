@extends('layouts.main')
@section('js')
    <script>
        function updateCart(quantity, id) {
            $.ajax({
                url: '{{ asset('cart/update') }}',
                type: 'GET',
                data: {
                    quantity: quantity,
                    id: id
                },
                success: function() {
                    location.reload();
                }
            });
        }
    </script>
@endsection
@section('main')

    @if ($count >= 1)
        <section class="shopping-cart-container">
            <div class="products-container">
                <h3 class="title">Thông tin giỏ hàng</h3>
                <div class="box-container">
                    @foreach ($data as $item)
                        <div class="box">
                            {{-- <i class="fas fa-times"></i> --}}
                            <a href="{{ asset('cart/delete/' . $item['id']) }}" class="fas fa-times"></a>
                            <img src="{{ asset('images/' . $item['attributes']['hinhanh']) }}" alt="" width="100px">
                            <div class="content">
                                <h3>{{ $item['name'] }}</h3>
                                <span> Số lượng: </span>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" id="quantity" min="1"
                                    onchange="updateCart(this.value,'{{ $item['id'] }}')">
                                <br>
                                <span> Ghi chú: </span>
                                <input name="note" id="note" value="{{ $item['attributes']['note'] }}">
                                <br>
                                <span> Giá: </span>
                                <span class="price"> {{ number_format($item['price']) }} VNĐ </span>
                                <br>
                                <span> Tổng: </span>
                                <span> {{ number_format($item['quantity'] * $item['price']) }} VNĐ </span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="cart-total">
                <h3 class="title"> Hóa đơn </h3>
                <div class="box">
                    <h3 class="total"> Thanh toán : <span>{{ number_format($total) }} VNĐ</span> </h3>

                    {{-- <a href="{{route('login_checkout')}}" class="btn">Thanh toán</a> --}}

                    <form action="{{route('checkout')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên khách hàng</label>
                            <input name="hoten">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input name="sdt">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input name="diachi">
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <input name="ghichu">
                        </div>
                        <button type="submit" class="btn">Thanh toán</button>
                    </form>
                </div>
            </div>
        </section>
    @else
        <div class="box">
            <h3>Không có sản phẩm nào trong giỏ hàng</h3>
        </div>
    @endif


@endsection
