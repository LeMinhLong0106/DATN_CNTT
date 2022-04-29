@extends('layouts.admin')

@section('content_admin')
    <div class="checkform">
        <div class="content">
            <div class="container-fluid" id="">
                <h3 class="text-center">CHI TIẾT HÓA ĐƠN: {{ $data->id }} </h3>
                <br />
                <h4>Danh sách món ăn</h4>
                <table class="table table-striped table-class">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên món</th>
                            <th>số lượng</th>
                            <th>giá bán</th>
                            <th>tổng tiền</th>
                            <th>chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cthd as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->monanss->tenmonan }}</td>
                                <td>{{ $item->soluong }}</td>
                                <td>{{ number_format($item->giaban) }} VNĐ</td>
                                <td>{{ number_format($item->soluong * $item->giaban) }} VNĐ</td>
                                <td>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr />
                <div style="text-align:right;">
                    <h4>Tổng tiền: {{$data->tongtien}}</h4>
                </div>
            </div>

        </div>
    </div>
@endsection
