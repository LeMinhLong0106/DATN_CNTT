@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('donvitinh.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH ĐƠN VỊ TÍNH</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Số bàn</th>
                    <th>Ngày đặt</th>
                    <th>Nhân viên</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ban_id }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->nhanvien_id }}</td>
                        <td>{{ $item->tongtien }}</td>
                        <td>
                            @if ($item->trangthai == 0)
                                <span class="badge badge-danger">Chưa thanh toán</span>
                            @else
                                <span class="badge badge-success">Đã thanh toán</span>
                            @endif
                        <td>
                            {{-- <a href=""><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                            <a href=""><i class='fa fa-trash'></i></a> --}}
                            <a href="{{ route('donvitinh.show', [$item->id]) }} " class="fa fa-edit"></a>

                            <form action="{{ route('donvitinh.destroy', [$item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
@endsection
