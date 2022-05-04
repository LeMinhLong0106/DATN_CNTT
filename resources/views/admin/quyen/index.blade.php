@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{route('vaitro.create')}}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH Quyền</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Tên quyền</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->tenquyen }}</td>
                        <td>{{ $item->mota }}</td>
                        {{-- <td>{{ $item->tinhtrang }}</td> --}}

                        <td>
                            <a href="{{ route('vaitro.show', [$item->id]) }} " class="fa fa-edit"></a>

                            <form action="{{ route('vaitro.destroy', [$item->id]) }}" method="POST">
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
