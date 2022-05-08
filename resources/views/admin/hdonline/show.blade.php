@extends('layouts.admin')

@section('content_admin')
    <div class="checkform">
        <div class="content">
            <div class="container-fluid">
                <h3 class="text-center">CHI TIẾT HÓA ĐƠN: {{ $data->id }} </h3>
                <hr />
                <div style="margin-left: 150px;">
                    <div class="row">
                        <div class="col-md-6"><b>Số HĐ: </b> {{ $data->id }}</div>
                        <div class="col-md-6"><b>Ngày mua: </b> {{ date('d/m/Y', strtotime($data->created_at)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><b>Họ tên khách hàng: </b>{{ $data->hoten }} </div>
                        <div class="col-md-6"><b>Số điện thoại: </b>{{ $data->sdt }} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><b>Địa chỉ: </b>{{ $data->diachi }} </div>
                        <div class="col-md-6"><b>Ghi chú: </b>{{ $data->ghichu }} </div>
                    </div>
                </div>
                <br />
                <form action="{{ route('hdonline.thanhtoanon', [$data->id]) }}" method="post">
                    @csrf
                    <h4>Danh sách món ăn</h4>
                    <table class="table table-striped table-class">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên món</th>
                                <th>Số lượng</th>
                                <th>Ghi chú</th>
                                <th>Giá bán</th>
                                <th>tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cthd as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset('images/' . $item->monanss->hinhanh) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $item->monanss->tenmonan }}</td>
                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->ghichu }}</td>
                                    <td>{{ number_format($item->giaban) }} VNĐ</td>
                                    <td>{{ number_format($item->soluong * $item->giaban) }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr />
                    <div style="text-align:right;">
                        <h4>Tổng tiền: {{ $data->tongtien }}</h4>
                    </div>

                    <div style="text-align:center;">
                        <div>
                            <input type="submit" name="them" value="Thanh toán" class="btn btn-primary" />
                            <a href="" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
