@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <form method="get" class="form-inline justify-content-center" role="form">
            <div class="form-group">
                <label for="">Từ ngày</label>
                <input type="date" name="date_from" class="form-control" value="date_from">
            </div>
            <div class="form-group">
                <label for="">Đến ngày</label>
                <input type="date" name="date_to" class="form-control" value="date_to">
            </div>

            <button type="submit" class="btn btn-primary">Báo cáo</button>
        </form>
        <h3 class="text-center">Báo cáo doanh thu</h3>


        @if ($hdtq->count() > 0)
            <h4 class="text-center">Từ ngày {{ date('d-m-Y', strtotime($date_from)) }} đến ngày
                {{ date('d-m-Y', strtotime($date_to)) }}</h4>

            <table class="table table-striped table-class">
                <thead>
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Số bàn</th>
                        <th>Ngày đặt</th>
                        <th>Nhân viên phục vụ</th>
                        <th>Nhân viên thu ngân</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hdtq as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ban_id }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->nhanvien_id }}</td>
                            <td>{{ $item->nhanvien_tn }}</td>
                            <td>{{ $item->tongtien }}</td>
                            <td>
                                @if ($item->tinhtrang == 0)
                                    <span class="badge badge-danger">Chưa thanh toán</span>
                                @else
                                    <span class="badge badge-success">Đã thanh toán</span>
                                @endif
                            <td>
                                <a class="btn btn-warning btn-circle btn-sm"
                                    href="{{ route('hdtaiquay.showReceipt', [$item->id]) }}">
                                    <i class="fas fa-eye"></i></a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <h3>Tổng tiền: {{ $tttq }}</h3>
        @else
            <h3 class="text-center">Hiện tại chưa có hóa đơn</h3>
        @endif


        {{-- món ăn --}}
        <h3 class="text-center">Món ăn bán nhiều nhất</h3>

        <table class="table table-striped table-class">
            <thead>
                <tr>
                    <th>Món ăn</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soluongmon as $item)
                    <tr>
                        <td>{{ $item->monanss->tenmonan }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
