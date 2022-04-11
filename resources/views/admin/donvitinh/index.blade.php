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
                    <th>Mã đơn vị</th>
                    <th>tên đơn vị</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tendvt }}</td>
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
        {{-- <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div> --}}
    </div>
@endsection
