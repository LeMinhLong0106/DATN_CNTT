@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Quản lý nhân viên</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn-circle btn-sm" id="add_nhanvien">
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="list_nhanvien">
                            @foreach ($data as $item)
                                <tr id="row_nhanvien_{{ $item->id }}">
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->vaitro_id }}</td>
                                    {{-- <td>{{ $item->vaitross->mota }}</td> --}}
                                    <td>
                                        <button type="button" id="edit_nhanvien" class="btn btn-primary"
                                            data-id="{{ $item->id }}">Sửa</button>
                                        <button type="button" id="delete_nhanvien" class="btn btn-danger"
                                            data-id="{{ $item->id }}">Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_nhanvien">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_nhanvien">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="name">Tên nhân viên</label>
                            <input type="text" class="name form-control" name="name" id="name">
                            <span class="text-danger error-text name_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="email form-control" name="email" id="email">
                            <span class="text-danger error-text email_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="text" class="password form-control" name="password" id="password">
                            <span class="text-danger error-text password_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Vai trò</label>
                            <select name="vaitro_id" id="vaitro_id" class="form-control text-box single-line" required>
                                <option value="" class="form-control">Vai trò</option>
                                @foreach ($vaitros as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->mota }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#add_nhanvien').on('click', function() {
            $('#form_nhanvien').trigger('reset');
            $('#modal_title').html('Thêm nhân viên');
            $('#modal_nhanvien').modal('show');
        });

        // sửa
        $("tbody").on('click', '#edit_nhanvien', function() {
            $('#form_nhanvien').trigger('reset');
            $('#modal_title').html('Sửa nhân viên');
            var id = $(this).data('id');
            $.get('nhanvien/' + id, function(data) {
                console.log(data);
                $('#modal_title').html('Sửa nhân viên');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#vaitro_id').val(data.vaitro_id);
                $('#modal_nhanvien').modal('show');
            });
        });

        // xóa
        $("tbody").on('click', '#delete_nhanvien', function() {
            var id = $(this).data('id');
            confirm('Bạn có chắc chắn muốn xóa?');
            $.ajax({
                type: 'DELETE',
                url: '{{ route('nhanvien.destroy', ':id') }}'.replace(':id', id),
                success: function(data) {
                    $('#row_nhanvien_' + id).remove();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        // save form
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('nhanvien.store') }}",
                data: $('#form_nhanvien').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
            }).done(function(res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value) {
                        $('span.' + key + '_err').text(value[0]);
                    });
                } else {
                    var html = '<tr id="row_nhanvien_' + res.data.id + '">';
                    html += '<td>' + res.data.name + '</td>';
                    html += '<td>' + res.data.email + '</td>';
                    $.each(res.vaitros, function(value) {
                        if (res.data.vaitro_id == res.vaitros[value].id) {
                            html += '<td>' + res.vaitros[value].mota + '</td>';
                        }
                    });
                    html += '<td>' +
                        '<button type="button" id="edit_nhanvien" class="btn btn-primary mr-1" data-id="' +
                        res.data.id + '">Sửa</button>' +
                        '<button type="button" id="delete_nhanvien" class="btn btn-danger" data-id="' +
                        res.data.id + '">Xóa</button>' + '</td>';
                    html += '</tr>';
                    // sửa
                    if ($('#id').val()) { //id hidden
                        $('#row_nhanvien_' + res.data.id).replaceWith(html); // thay thế
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Sửa thành công');
                    } else {
                        $('#list_nhanvien').prepend(html); // thêm vào đầu
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Thêm thành công');
                    }

                    $('#form_nhanvien').trigger('reset');
                    $('#modal_nhanvien').modal('hide');

                    setTimeout(function() {
                        $('#message').removeClass('alert alert-success');
                        $('#message').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection


{{-- @extends('layouts.admin')

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
@endsection --}}
