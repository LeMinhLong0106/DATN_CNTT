@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Quản lý bàn</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách bàn</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn-circle btn-sm" id="add_ban">
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Số bàn</th>
                                <th>Số ghế</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="list_ban">
                            @foreach ($data as $item)
                                <tr id="row_ban_{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->ghe }}</td>
                                    <td>
                                        @if ($item->tinhtrang == 1)
                                            <span class="badge badge-success">Đã đặt</span>
                                        @else
                                            <span class="badge badge-danger">Trống</span>
                                        @endif
                                    <td>
                                        <button type="button" id="edit_ban" class="btn btn-primary"
                                            data-id="{{ $item->id }}">Sửa</button>
                                        <button type="button" id="delete_ban" class="btn btn-danger"
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

    <div class="modal fade" id="modal_ban">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_ban">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="ghe">Số ghế</label>
                            <input type="number" class="ghe form-control" name="ghe" id="ghe">
                            <span class="text-danger error-text ghe_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" class="tinhtrang" name="tinhtrang" value="0" checked> Trống
                            <input type="radio" class="tinhtrang" name="tinhtrang" value="1"> Đã đặt
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

        $('#add_ban').on('click', function() {
            $('#form_ban').trigger('reset');
            $('#modal_title').html('Thêm bàn');
            $('#modal_ban').modal('show');
        });

        // sửa
        $("tbody").on('click', '#edit_ban', function() {
            var id = $(this).data('id');
            $.get('ban/' + id + '/edit', function(res) {
                $('#modal_title').html('Sửa bàn');
                $('#id').val(res.id);
                $('#ghe').val(res.ghe);
                $('.tinhtrang').val(res.tinhtrang);
                $('#modal_ban').modal('show');
            });
        });

        // xóa
        $("tbody").on('click', '#delete_ban', function() {
            var id = $(this).data('id');
            confirm('Bạn có chắc chắn muốn xóa?');
            $.ajax({
                type: 'DELETE',
                url: '{{ route('ban.destroy', ':id') }}'.replace(':id', id),
            }).done(function(data) {
                $('#row_ban_' + id).remove();
            });
        });

        // save form
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('ban.store') }}",
                data: $('#form_ban').serialize(),
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
            }).done(function(res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value) {
                        $('span.' + key + '_err').text(value[0]);
                    });
                } else {
                    var html = '<tr id="row_ban_' + res.id + '">';
                    html += '<td>' + res.id + '</td>';
                    html += '<td>' + res.ghe + '</td>';
                    if (res.tinhtrang == 1) {
                        html += '<td><span class="badge badge-success">Đã đặt</span></td>';
                    } else {
                        html += '<td><span class="badge badge-danger">Trống</span></td>';
                    }
                    html += '<td>' +
                        '<button type="button" id="edit_ban" class="btn btn-primary mr-1" data-id="' +
                        res.id + '">Sửa</button>' +
                        '<button type="button" id="delete_ban" class="btn btn-danger" data-id="' +
                        res.id + '">Xóa</button>' + '</td>';
                    html += '</tr>';
                    // sửa
                    if ($('#id').val()) { //id hidden
                        $('#row_ban_' + res.id).replaceWith(html); // thay thế
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Sửa thành công');
                    } else {
                        $('#list_ban').prepend(html); // thêm vào đầu
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Thêm thành công');
                    }

                    $('#form_ban').trigger('reset');
                    $('#modal_ban').modal('hide');

                    setTimeout(function() {
                        $('#message').removeClass('alert alert-success');
                        $('#message').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection
