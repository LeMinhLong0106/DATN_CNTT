@extends('layouts.admin')

@section('content_admin')
    {{-- <div class="container-fluid">
        
        <div class="col-lg-6">
            <a href="{{ route('ban.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH BÀN</h3>
        
        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
        @endif

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
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ghe }}</td>
                        <td>
                            @if ($item->tinhtrang == 1)
                                <span class="badge badge-success">Enable</span>
                            @else
                                <span class="badge badge-danger">Disable</span>
                            @endif
                        <td class="d-flex">
                            <a href="{{ route('ban.show', [$item->id]) }} " class="btn btn-warning mr-1">Edit</a>

                            <form action="{{ route('ban.destroy', [$item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')                                
                                <input type="submit" class='btn btn-danger' value='Delete'>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div> --}}
    {{-- <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModel">
            Add
        </button>

        <table class="table">
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
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ghe }}</td>
                        <td>{{ $item->tinhtrang }}</td>
                        <td>
                            <button type="button" id="edit_cate" class="btn btn-primary editbtn"
                                data-id="{{ $item->id }}">Edit</button>
                            <button type="button" id="delete_cate" class="btn btn-danger deletebtn"
                                data-id="{{ $item->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div> --}}

    {{-- <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Table Management</h1>

        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Table List</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" name="add_table" id="add_table" class="btn btn-success btn-circle btn-sm"
                            data-toggle="modal" data-target="#addModel"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable" >
                        <thead>
                            <tr>
                                <th>Số bàn</th>
                                <th>Số ghế</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Table Management</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Table List</h6>
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
                        <ul id="saveform_errList"></ul>

                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="ghe">Số ghế</label>
                            <input type="number" class="ghe form-control" name="ghe" id="ghe">
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


    <!-- Modal add-->
    {{-- <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bàn</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>

                    <div class="form-group">
                        <label for="ghe">Số ghế</label>
                        <input type="number" class="ghe form-control" name="ghe">
                    </div>
                    <div class="form-group">
                        <label for="tinhtrang">Tình trạng</label>
                        <input type="radio" class="tinhtrang" name="tinhtrang" value="0" checked> Trống
                        <input type="radio" class="tinhtrang" name="tinhtrang" value="1"> Đã đặt
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_modal">Lưu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal edit-->
    {{-- <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="editform">
                    @csrf
                    @method('PUT')
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit item</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="ghe">Ghế</label>
                            <input type="text" class="form-control" id="ghe" name="ghe" placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" name="tinhtrang" value="1" id="tinhtrang"> Enable
                            <input type="radio" name="tinhtrang" value="0" id="tinhtrang"> Disable

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- <form id="addform">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm bàn</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ghe">Số ghế</label>
                            <input type="number" class="ghe form-control" name="ghe">
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" name="tinhtrang" value="0" checked> Trống
                            <input type="radio" name="tinhtrang" value="1"> Đã đặt
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary add_modal">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form> --}}
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
            }).done(function(res) {
                
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
                    $('#message').html('Sửa thành công');
                } else {
                    $('#list_ban').prepend(html); // thêm vào đầu
                    $('#message').html('Thêm thành công');
                }

                $('#form_ban').trigger('reset');
                $('#modal_ban').modal('hide');

                setTimeout(function() {
                    $('#message').removeClass('alert alert-success');
                    $('#message').html('');
                }, 3000);
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            listData();

            function listData() {
                $.ajax({
                    url: '{{ route('ban.create') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $.each(response.data, function(key, item) {
                            $('tbody').append('<tr>\
                                                <td>' + item.id + '</td>\
                                                <td>' + item.ghe + '</td>\
                                                <td>' + item.tinhtrang + '</td>\
                                                <td>\
                                                    <button type="button" value="' + item.id + '" class="btn btn-primary editbtn">Sửa</button>\
                                                    <button type="button" value="' + item.id + '" class="btn btn-danger deletebtn">Xóa</button>\
                                                </td>\
                                            </tr>');
                        });

                    }
                });
            }

            $(document).on('click', '.add_modal', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data = {
                    ghe: $('.ghe').val(),
                    tinhtrang: $('.tinhtrang').val()
                };
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ban.store') }}',
                    data: data,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#saveform_errList').append('<li>' + err_values +
                                    '</li>');
                            });
                        } else {
                            $('#saveform_errList').html("");
                            $('#message').addClass('alert alert-success');
                            $('#message').text(response.message);
                            $('#addModel').modal('hide');
                            listData();
                        }
                    }
                });
            });
            // thêm
            // $('#addform').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route('ban.store') }}',
            //         data: $('#addform').serialize(),
            //         success: function(res) {
            //             // console.log(res);
            //             $('#addModel').modal('hide');
            //             alert('Thêm thành công');
            //             location.reload();
            //         },
            //         error: function(res) {
            //             console.log(res);
            //         }
            //     });
            // });

            // nhấn nút sửa hiển thị modal
            $('.editbtn').on('click', function() {
                $('#editModel').modal('show');
                var id = $(this).data('id');
                // var message_pri = $("input[name='tinhtrang']:checked").val();
                // console.log(message_pri);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('ban.show', ':id') }}'.replace(':id', id),

                    success: function(data) {
                        $('#id').val(data.data.id);
                        $('#ghe').val(data.data.ghe);
                        // $('#tinhtrang').val(data.data.tinhtrang);
                        // $("#tinhtrang:checked").val();
                        $("input[name='tinhtrang']:checked").val(data.data.tinhtrang);
                        console.log(data);
                    }
                });

                // $tr = $(this).closest('tr');
                // var data = $tr.children("td").map(function() {
                //     return $(this).text();
                // }).get();

                // $('#id').val(data[0]);
                // $('#title').val(data[1]);
                // $('#des').val(data[2]);

            });

            // sửa
            $('#editform').on('submit', function(e) {
                e.preventDefault();
                var id = $('#id').val();
                $.ajax({
                    type: 'PUT',
                    url: '{{ route('ban.update', ':id') }}'.replace(':id', id),
                    data: $('#editform').serialize(),
                    success: function(res) {
                        console.log(res);
                        $('#editModel').modal('hide');
                        alert('Sửa thành công');
                        location.reload();
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            });

            // xóa
            $('.deletebtn').on('click', function() {
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('ban.destroy', ':id') }}'.replace(':id', data[0]),
                        success: function(res) {
                            console.log(res);
                            location.reload();
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                }
            });

        });
    </script> --}}
@endsection
