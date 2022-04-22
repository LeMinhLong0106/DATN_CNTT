@extends('layouts.main')

@section('js')
    <script>
        function addToCart(e) {
            e.preventDefault();
            let urlCard = $(this).data('url');
            $.ajax({
                url: urlCard,
                type: 'GET',
                dataType: 'json',
                success: function(data) {},
                error: function(data) {}
            });

        }

        $(function() {
            $('.add_to_cart').on('click', addToCart);
        });
    </script>
@endsection
@section('main')
    <div class="container">
        <form action="{{ route('add_in_detail') }}" method="post">
            @csrf
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/' . $data->hinhanh) }}" alt="Card image cap">
                <input type="hidden" name="hinhanh" value="{{ $data->hinhanh }}">
                <div class="card-body">
                    <input type="hidden" name="monanID" value="{{ $data->id }}">
                    <h5 class="card-title">Tên món: {{ $data->tenmonan }}</h5>
                    <input type="hidden" name="tenmonan" value="{{ $data->tenmonan }}">

                    <p class="card-text">Mô tả: {{ $data->mota }}</p>
                    <p class="card-text">Giá: {{ number_format($data->gia) }}</p>
                    <input type="hidden" name="price" value="{{ $data->gia }}">

                    @if ($data->tinhtrang == 1)
                        <p class="data__description">Tình trạng: Còn hàng</p>
                    @else
                        <p class="data__description">Tình trạng: Hết hàng</p>
                    @endif
                    Số lượng:
                    <input type="number" name="quantity" value="1" id="quantity" min="1">

                    <br>
                    Ghi chú: <input name="ghichu" id="ghichu">
                    <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />

                </div>
            </div>
        </form>
    </div>
@endsection
