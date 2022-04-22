@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h3 class="text-center">DANH SÁCH HÓA ĐƠN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>họ tên</th>
                    <th>Tổng tiền</th>
                    <th>Ngày mua</th>
                    <th>tình trạng</th>
                    <th>chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->hoten }}</td>
                        <td>{{ number_format($item->tongtien) }} VNĐ</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>
                            @if ($item->tinhtrang === 0)
                                <span class="badge badge-danger">Chưa xử lý</span>
                            @else
                                <span class="badge badge-success">Đã xử lý</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('hdonline.show', $item->id) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('hdonline.destroy', $item->id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{-- <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div> --}}
    </div>
@endsection
