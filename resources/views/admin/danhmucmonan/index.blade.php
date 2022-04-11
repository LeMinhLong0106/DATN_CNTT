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
                    <th>Mã danh mục món</th>
                    <th>tên danh mục món</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tendm }}</td>
                        <td>
                            {{-- <a href=""><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                            <a href=""><i class='fa fa-trash'></i></a> --}}
                            <a href="{{ route('danhmucmonan.show', [$item->id]) }} " class="fa fa-edit"></a>

                            <form action="{{ route('danhmucmonan.destroy', [$item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash"></button>
                            </form>
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
