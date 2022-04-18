@extends('layouts.main')

@section('main')
    {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên món</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($cart as $item)
                @php
                    $total += $item['qty'] * $item['gia'];
                @endphp
                <tr>
                    <th scope="row">1</th>
                    <td><img src="{{ asset('images/' . $item['hinhanh']) }}" alt="" width="100px"></td>
                    <td>{{ $item['tenmonan'] }}</td>
                    <td>
                        <input type="number" name="qty" value="{{ $item['qty'] }}" class="form-control" id="qty">
                    </td>
                    <td>{{ $item['gia'] }} VNĐ</td>
                    <td>
                        <input name="ghichu" id="ghichu" cols="30" rows="10" class="form-control">{{ $item['ghichu'] }}
                    </td>
                    <td>{{ number_format($item['qty'] * $item['gia']) }} VNĐ</td>
                    <td>
                        <a href="" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h3>Tổng tiền: {{ number_format($total) }} VNĐ</h3>
    </div> --}}

    <section class="shopping-cart-container">
        <div class="products-container">
            <h3 class="title">your products</h3>
            <div class="box-container">
                @foreach ($cart as $item)
                    <div class="box">
                        <i class="fas fa-times"></i>
                        <img src="{{ asset('images/' . $item['hinhanh']) }}" alt="" width="100px">
                        <div class="content">
                            <h3>{{ $item['tenmonan'] }}</h3>
                            <span> Số lượng: </span>
                            <input type="number" name="qty" value="{{ $item['qty'] }}" id="qty">
                            <br>
                            <span> Ghi chú: </span>
                            <input name="ghichu" id="ghichu">{{ $item['ghichu'] }}
                            <br>
                            <span> Giá: </span>
                            <span class="price"> {{ number_format($item['gia']) }} VNĐ </span>
                            <br>
                            <span> Tổng: </span>
                            <span class="price"> {{number_format($item['qty'] * $item['gia'])}} VNĐ </span>
                        </div>
                    </div>
                @endforeach


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

    </section>
@endsection
