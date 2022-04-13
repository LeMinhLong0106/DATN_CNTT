@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('nhanvien.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH NHÂN VIÊN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Tên nhân viên</th>
                    <th>Email</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>

                        <td>
                            <a href="{{ route('nhanvien.show', [$item->id]) }} " class="fa fa-edit"></a>
                            {{-- <a href="{{ route('nhanvien.destroy', [$item->id]) }}" class="fa fa-trash delete_action"></a> --}}
                            <form action="{{ route('nhanvien.destroy', [$item->id]) }}" method="POST">
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
