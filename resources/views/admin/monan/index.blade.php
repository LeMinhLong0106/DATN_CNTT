@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('danhmucmonan.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH MÓN ĂN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã món ăn</th>
                    <th>Hình ảnh</th>
                    <th>Tên món</th>
                    {{-- <th>Mô tả</th> --}}
                    <th>Giá</th>
                    <th>Tình trạng</th>
                    <th>Ngày thêm</th>
                    <th>ĐVT</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->MaMonAn }}</td>
                        <td><img src="{{ asset('storage/'.$item->HinhAnh) }}" alt="" width="100px"></td>
                        {{-- <td>{{ $item->HinhAnh }}</td> --}}
                        <td>{{ $item->TenMonAn }}</td>
                        {{-- <td>{{ $item->MoTa }}</td> --}}
                        <td>{{ $item->Gia }}</td>
                        <td>
                            @if ($item->TinhTrang == 1)
                                <span class="badge badge-success">Còn bán</span>
                            @else
                                <span class="badge badge-danger">Hết bán</span>
                            @endif
                        <td>{{ $item->NgayThem }}</td>

                        @foreach ($donvitinh as $dm)
                            @if ($item->MaDVT == $dm->MaDVT)
                                <td>{{ $dm->TenDVT }}</td>
                            @endif
                        @endforeach

                        @foreach ($danhmuc as $dm)
                            @if ($item->MaMDMA == $dm->MaMDMA)
                                <td>{{ $dm->TenDMMA }}</td>
                            @endif
                        @endforeach

                        <td>
                            <a href=""><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                            <a href=""><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
