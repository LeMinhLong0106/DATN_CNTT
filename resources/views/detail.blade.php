{{-- @extends('layouts.main')

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
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('images/' . $data->hinhanh) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Tên món: {{ $data->tenmonan }}</h5>
            <p class="card-text">Mô tả: {{ $data->mota }}</p>
            <p class="card-text">Mô tả: {{ $data->gia }}</p>
            @if ($data->tinhtrang == 1)
                <p class="data__description">Tình trạng: Còn hàng</p>
            @else
                <p class="data__description">Tình trạng: Hết hàng</p>
            @endif
            <a href="#" data-url="{{ route('addToCart', [$data->id]) }}" class="btn btn-primary add_to_cart">Go
                somewhere</a>
        </div>
    </div>
@endsection --}}
