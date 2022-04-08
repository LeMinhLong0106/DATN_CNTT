@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('ban.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH BÀN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã bàn</th>
                    <th>Ghế</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->MaBan }}</td>
                        <td>{{ $item->Ghe }}</td>
                        <td>{{ $item->TinhTrang }}</td>
                        <td>
                            <a href=""><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                            <a href=""><i class='fa fa-trash'></i></a>
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
