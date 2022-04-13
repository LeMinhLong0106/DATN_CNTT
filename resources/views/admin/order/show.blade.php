@extends('layouts.admin')

@section('content_admin')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Thông tin order</h1>
    <div class="row">
        <div class="col col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên món</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Ghi chú</th>
                                    <th>Thành tiền</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->soluong }}</td>
                                        <td>{{ $item->gia }}</td>
                                        <td>{{ $item->ghichu }}</td>
                                        <td>
                                            <a href="#" class="">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
