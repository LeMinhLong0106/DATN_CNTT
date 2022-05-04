@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Quản lý danh mục</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn-circle btn-sm" id="add_danhmuc">
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="list_danhmuc">
                            @foreach ($data as $item)
                                <tr id="row_danhmuc_{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tendm }}</td>
                                    <td>
                                        <button type="button" id="edit_danhmuc" class="btn btn-primary"
                                            data-id="{{ $item->id }}">Sửa</button>
                                        <button type="button" id="delete_danhmuc" class="btn btn-danger"
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

    <div class="modal fade" id="modal_danhmuc">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_danhmuc">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="tendm">Tên danh mục</label>
                            <input type="text" class="tendm form-control" name="tendm" id="tendm">
                            <span class="text-danger error-text tendm_err"></span>
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

        $('#add_danhmuc').on('click', function() {
            $('#form_danhmuc').trigger('reset');
            $('#modal_title').html('Thêm danh mục');
            $('#modal_danhmuc').modal('show');
        });

        // sửa
        $("tbody").on('click', '#edit_danhmuc', function() {
            $('#form_danhmuc').trigger('reset');
            $('#modal_title').html('Sửa danh mục');
            var id = $(this).data('id');
            $.get('danhmuc/' + id, function(data) {
                console.log(data);
                $('#modal_title').html('Sửa danh mục');
                $('#id').val(data.id);
                $('#tendm').val(data.tendm);
                $('#modal_danhmuc').modal('show');

            });
        });

        // xóa
        $("tbody").on('click', '#delete_danhmuc', function() {
            var id = $(this).data('id');
            confirm('Bạn có chắc chắn muốn xóa?');
            $.ajax({
                type: 'DELETE',
                url: '{{ route('danhmuc.destroy', ':id') }}'.replace(':id', id),
                success: function(data) {
                    $('#row_danhmuc_' + id).remove();
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
                url: "{{ route('danhmuc.store') }}",
                data: $('#form_danhmuc').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
            }).done(function(res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value) {
                        $('span.' + key + '_err').text(value[0]);
                    });
                } else {
                    var html = '<tr id="row_danhmuc_' + res.id + '">';
                    html += '<td>' + res.id + '</td>';
                    html += '<td>' + res.tendm + '</td>';
                    html += '<td>' +
                        '<button type="button" id="edit_danhmuc" class="btn btn-primary mr-1" data-id="' +
                        res.id + '">Sửa</button>' +
                        '<button type="button" id="delete_danhmuc" class="btn btn-danger" data-id="' +
                        res.id + '">Xóa</button>' + '</td>';
                    html += '</tr>';
                    // sửa
                    if ($('#id').val()) { //id hidden
                        $('#row_danhmuc_' + res.id).replaceWith(html); // thay thế
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Sửa thành công');
                    } else {
                        $('#list_danhmuc').prepend(html); // thêm vào đầu
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Thêm thành công');
                    }

                    $('#form_danhmuc').trigger('reset');
                    $('#modal_danhmuc').modal('hide');

                    setTimeout(function() {
                        $('#message').removeClass('alert alert-success');
                        $('#message').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection
