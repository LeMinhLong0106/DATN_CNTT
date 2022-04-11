@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('monan.create') }}">
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
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ asset('storage/'.$item->hinhanh) }}" alt="" width="100px"></td>
                        {{-- <td>{{ $item->HinhAnh }}</td> --}}
                        <td>{{ $item->tenmonan }}</td>
                        {{-- <td>{{ $item->MoTa }}</td> --}}
                        <td>{{ $item->gia }}</td>
                        <td>
                            @if ($item->tinhtrang == 1)
                                <span class="badge badge-success">Còn bán</span>
                            @else
                                <span class="badge badge-danger">Hết bán</span>
                            @endif
                        </td>
                        {{-- <td>{{ $item->created_at }}</td> --}}
                        <td>{{date($item->created_at)}}</td>

                        @foreach ($donvitinh as $dm)
                            @if ($item->donvitinh == $dm->id)
                                <td>{{ $dm->tendvt }}</td>
                            @endif
                        @endforeach

                        @foreach ($danhmuc as $dm)
                            @if ($item->danhmuc == $dm->id)
                                <td>{{ $dm->tendm }}</td>
                            @endif
                        @endforeach

                        <td>
                            {{-- <a href=""><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                            <a href=""><i class='fa fa-trash'></i></a> --}}
                            <a href="{{ route('monan.show', [$item->id]) }} " class="fa fa-edit"></a>

                            <form action="{{ route('monan.destroy', [$item->id]) }}" method="POST">
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
