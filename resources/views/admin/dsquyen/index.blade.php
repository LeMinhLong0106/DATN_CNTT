@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h3 class="text-center">DANH SÁCH VAI TRÒ-QUYỀN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Vai trò</th>
                    <th>Quyền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->vaitro_id }}</td>
                        <td>{{ $item->quyen_id }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{-- <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div> --}}
    </div>
@endsection
