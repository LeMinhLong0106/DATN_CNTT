@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Danh sách đặc món</h1>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên món ăn</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cthd as $item)
                                        @if ($item->tinhtrang == 0)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td> {{ $item->tenmonan }} </td>
                                                <td>{{ $item->soluong }}</td>
                                                <td>{{ $item->tendm }}</td>
                                                <td>{{ $item->ghichu }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            @foreach ($data as $hd)
                @if ($hd->tinhtrang == 0)
                    <div class="col col-sm-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h3>Hóa đơn: {{ $hd->id }}</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên món ăn</th>
                                                <th>Số lượng</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cthd as $item)
                                                @if ($item->hdtaiquay_id == $hd->id)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td> {{ $item->monanss->tenmonan }} </td>
                                                        <td>{{ $item->soluong }}</td>
                                                        <td>{{ $item->ghichu }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div> --}}

    </div>
@endsection
