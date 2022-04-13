@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Order Area</h1>
        <div class="row">
            <div class="col col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">Table Status</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Số bàn</th>
                                        <th>Tình trạng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bans as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                @if ($item->tinhtrang == 0)
                                                    <span class="badge badge-success">Bàn trống</span>
                                                @else
                                                    <span class="badge badge-danger">Có khách</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($item->trangthai == 0)
                                                    <span class="badge badge-danger">Empty</span>
                                                @elseif ($item->trangthai == 1)
                                                    <span class="badge badge-success">Occupied</span>
                                                @else
                                                    <span class="badge badge-warning">Reserved</span>
                                                @endif
                                            </td> --}}

                                            <td>
                                                <a href="{{ route('order.create') }} " class="">Thêm</a>|
                                                <a href="{{ route('order.show', [$item->id]) }}"
                                                    class="">Xem</a>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- <div class="col col-sm-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">Order Status</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Tổng tiền</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tenkh }}</td>
                                            <td>{{ $item->sodt }}</td>
                                            <td>{{ $item->tongtien }}</td>
                                            <td>
                                                <a href="{{ route('order.show', [$item->id]) }} "
                                                    class="fa fa-edit"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
