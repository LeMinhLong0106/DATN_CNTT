@extends('layouts.admin')
@section('content_admin')
    {{-- add model --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="addForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tenmonan">Tên món ăn</label>
                            <input type="text" class="form-control" name="tenmonan" placeholder="Nhập tên món ăn">
                            <span class="text-danger error-text tenmonan_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="gia">Giá</label>
                            <input type="number" class="form-control" name="gia" placeholder="Nhập giá">
                            <span class="text-danger error-text gia_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả</label>
                            <textarea class="form-control" name="mota" rows="3"></textarea>
                            <span class="text-danger error-text mota_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="thoigian">Thời gian nấu(phút)</label>
                            <input type="number" class="form-control" name="thoigian" placeholder="Nhập thời gian">
                            <span class="text-danger error-text thoigian_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" name="tinhtrang" value="1" checked> Còn
                            <input type="radio" name="tinhtrang" value="0"> Hết
                        </div>
                        <div class="form-group">
                            <label for="hinhanh">Ảnh</label>
                            <input type="file" class="form-control" name="hinhanh">
                            <span class="text-danger error-text hinhanh_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="donvitinh">Đơn vị tính</label>
                            <select class="donvitinh form-control" name="donvitinh">
                                <option value="Suất">Suất</option>
                                <option value="Đĩa">Đĩa</option>
                                <option value="Phần">Phần</option>
                                <option value="Con">Con</option>
                                <option value="Kg">Kg</option>
                            </select>
                            <span class="text-danger error-text donvitinh_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="danhmuc">Danh mục</label>
                            <select class="danhmuc form-control" name="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tendm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit model --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="editForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="edit_monan_id" name="edit_monan_id">
                        <div class="form-group">
                            <label for="tenmonan">Tên món ăn</label>
                            <input type="text" class="form-control" id="tenmonan" name="tenmonan"
                                placeholder="Nhập tên món ăn">
                            <span class="text-danger error-text tenmonan_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="gia">Giá</label>
                            <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá">
                            <span class="text-danger error-text gia_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả</label>
                            <textarea class="form-control" id="mota" name="mota" rows="3"></textarea>
                            <span class="text-danger error-text mota_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="thoigian">Thời gian nấu(phút)</label>
                            <input type="number" class="form-control" id="thoigian" name="thoigian"
                                placeholder="Nhập thời gian">
                            <span class="text-danger error-text thoigian_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" class="tinhtrang" name="tinhtrang" value="1" checked> Còn
                            <input type="radio" class="tinhtrang" name="tinhtrang" value="0"> Hết
                        </div>
                        <div class="form-group">
                            <label for="hinhanh">Ảnh</label>
                            <input type="file" class="form-control" name="hinhanh">
                            <span class="text-danger error-text hinhanh_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="donvitinh">Đơn vị tính</label>
                            <select class="donvitinh form-control" name="donvitinh" id="donvitinh">
                                <option value="Suất">Suất</option>
                                <option value="Đĩa">Đĩa</option>
                                <option value="Phần">Phần</option>
                                <option value="Con">Con</option>
                                <option value="Kg">Kg</option>
                            </select>
                            <span class="text-danger error-text donvitinh_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="danhmuc">Danh mục</label>
                            <select class="danhmuc form-control" name="danhmuc" id="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tendm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- delete model --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="delete_monan_id" id="delete_monan_id">
                    <h4>Bạn xóa??</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_btn_model">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Quản lý món ăn</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách món ăn</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal"
                            data-target="#addModal">
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Hình ảnh</th>
                                <th>Tên món ăn</th>
                                <th>Giá</th>
                                <th>Tình trạng</th>
                                <th>Đơn vị tính</th>
                                <th>Danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
            loadMonAn();

            function loadMonAn() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('monan.create') }}',
                    success: function(data) {
                        // console.log(data.danhmuc[0].id);
                        $('tbody').html("");
                        // $.each(data.danhmuc, function(key, dm) {(dm.id == value.danhmuc ? dm.tendm : '')});
                        $.each(data.data, function(key, value) {                        
                            $('tbody').append('<tr>\
                                    <td>' + value.id + '</td>\
                                    <td><img src="{{ asset('images/') }}/' + value.hinhanh + '" width="100px"></td>\
                                    <td>' + value.tenmonan + '</td>\
                                    <td>' + value.gia + '</td>\
                                    <td>' + (value.tinhtrang == 1 ? '<span class="badge badge-success">Còn bán</span>' : '<span class="badge badge-danger">Hết</span>') + '</td>\
                                    <td>' + value.donvitinh + '</td>\
                                    <td> '+value.danhmuc+'</td>\
                                    <td>\
                                        <button type="button" value="' + value.id + '" class="btn btn-primary edit_btn"><i class="fas fa-edit"></i></button>\
                                        <button type="button" value="' + value.id + '" class="btn btn-danger delete_btn"><i class="fas fa-trash"></i></button>\
                                    </td>\
                                </tr>');
                        });
                    }
                });
            }
            // add
            $(document).on('submit', '#addForm', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('monan.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.errors) {
                            console.log(data.errors);
                            $.each(data.errors, function(key, value) {
                                $('span.' + key + '_err').text(value[0]);
                            });
                        } else {
                            $('#addModal').modal('hide');
                            $('#addForm')[0].reset();
                            $('#message').html(
                                '<div class="alert alert-success"> Thêm thành công</div>'
                            );
                            // $('table').attr('id', 'dataTable');
                            loadMonAn();
                            setTimeout(function() {
                                $('#message').removeClass('alert alert-success');
                                $('#message').html('');
                            }, 3000);
                        }
                    },
                });
            });
            // edit
            $(document).on('click', '.edit_btn', function(e) {
                e.preventDefault();
                var edit_monan_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: 'monan/' + edit_monan_id,
                    data: {
                        id: edit_monan_id
                    },
                    success: function(data) {
                        $('#edit_monan_id').val(edit_monan_id);
                        $('#editModal').modal('show');
                        $('#tenmonan').val(data.tenmonan);
                        $('#gia').val(data.gia);
                        $('#mota').val(data.mota);
                        $('#thoigian').val(data.thoigian);
                        $('#tinhtrang').val(data.tinhtrang);
                        $('#donvitinh').val(data.donvitinh);
                        $('#danhmuc').val(data.danhmuc);
                        $('#hinhanh').val(data.hinhanh);
                    }
                });
            });
            // update
            $(document).on('submit', '#editForm', function(e) {
                e.preventDefault();
                var id = $('#edit_monan_id').val();
                var formData = new FormData($('#editForm')[0]);
                $.ajax({
                    url: 'updateMonAn/' + id,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.errors) {
                            $.each(data.errors, function(key, value) {
                                $('span.' + key + '_err').text(value[0]);
                            });
                        } else {
                            $('#editModal').modal('hide');
                            $('#editForm')[0].reset();
                            $('#message').html(
                                '<div class="alert alert-success"> Cập nhật thành công</div>'
                            );
                            loadMonAn();
                            setTimeout(function() {
                                $('#message').removeClass('alert alert-success');
                                $('#message').html('');
                            }, 3000);
                        }
                    },
                });
            });
            // delete
            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault();
                var delete_monan_id = $(this).val();
                console.log(delete_monan_id);
                $('#deleteModal').modal('show');
                $('#delete_monan_id').val(delete_monan_id);


            });

            $(document).on('click', '.delete_btn_model', function(e) {
                e.preventDefault();
                var delete_monan_id = $('#delete_monan_id').val();
                // console.log(delete_monan_id);
                $.ajax({
                    type: 'DELETE',
                    url: 'monan/' + delete_monan_id,
                    data: {
                        id: delete_monan_id
                    },
                    success: function(data) {
                        $('#deleteModal').modal('hide');
                        loadMonAn();
                    }
                });
            })

        });
    </script>
@endsection

{{-- @extends('layouts.admin')
@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Quản lý món ăn</h1>
        <div id="message"></div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách món ăn</h6>
                    </div>
                    <div class="col" align="right">
                        <button type="button" class="btn btn-success btn-circle btn-sm" id="add_monan">
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Hình ảnh</th>
                                <th>Tên món</th>
                                <th>Giá</th>
                                <th>Tình trạng</th>
                                <th>ĐVT</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="list_monan">
                            @foreach ($data as $item)
                                <tr id="row_monan_{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset('images/' . $item->hinhanh) }}" alt="" width="100px"></td>
                                    <td>{{ $item->tenmonan }}</td>
                                    <td>{{ $item->gia }}</td>
                                    <td>
                                        @if ($item->tinhtrang == 1)
                                            <span class="badge badge-success">Còn bán</span>
                                        @else
                                            <span class="badge badge-danger">Hết bán</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->donvitinh }}</td>
                                    <td>{{ optional($item->danhmucss)->tendm }}</td>

                                    <td>
                                        <button type="button" id="edit_monan" class="btn btn-primary"
                                            data-id="{{ $item->id }}">Sửa</button>
                                        <button type="button" id="delete_monan" class="btn btn-danger"
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

    <div class="modal fade" id="modal_monan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_monan" enctype="multipart/form-data">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="tenmonan">Tên món ăn</label>
                            <input type="text" class="tenmonan form-control" name="tenmonan" id="tenmonan">
                            <span class="text-danger error-text tenmonan_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="gia">Giá</label>
                            <input type="text" class="gia form-control" name="gia" id="gia">
                            <span class="text-danger error-text gia_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả</label>
                            <input type="text" class="mota form-control" name="mota" id="mota">
                            <span class="text-danger error-text mota_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="tinhtrang">Tình trạng</label>
                            <input type="radio" name="tinhtrang" value="1" checked> Còn
                            <input type="radio" name="tinhtrang" value="0"> Hết
                        </div>
                        <div class="form-group">
                            <label for="donvitinh">Đơn vị tính</label>
                            <select class="donvitinh form-control" name="donvitinh" id="donvitinh">
                                <option value="Suất">Suất</option>
                                <option value="Đĩa">Đĩa</option>
                                <option value="Phần">Phần</option>
                                <option value="Con">Con</option>
                                <option value="Kg">Kg</option>
                            </select>
                            <span class="text-danger error-text donvitinh_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="danhmuc">Danh mục</label>
                            <select class="danhmuc form-control" name="danhmuc" id="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tendm }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text danhmuc_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="hinhanh">Hình ảnh</label>
                            <input type="file" class="hinhanh form-control" name="hinhanh" id="hinhanh">
                            <span class="text-danger error-text hinhanh_err"></span>
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

        $('#add_monan').on('click', function() {
            $('#form_monan').trigger('reset');
            $('#modal_title').html('Thêm món ăn');
            $('#modal_monan').modal('show');
        });
        // sửa
        $("tbody").on('click', '#edit_monan', function() {
            $('#form_monan').trigger('reset');
            $('#modal_title').html('Sửa món ăn');
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: 'monan/' + id,
                success: function(response) {
                    console.log(response);
                    $('#id').val(response.id);
                    $('#tenmonan').val(response.tenmonan);
                    $('#gia').val(response.gia);
                    $('.tinhtrang').val(response.tinhtrang);
                    $('#donvitinh').val(response.donvitinh);
                    $('#danhmuc').val(response.danhmuc);
                    $('#mota').val(response.mota);
                    
                    $('#modal_monan').modal('show');
                }
            });
        });
        // xoa
        $("tbody").on('click', '#delete_monan', function() {
            var id = $(this).data('id');
            confirm('Bạn có chắc chắn muốn xóa?');
            $.ajax({
                type: 'DELETE',
                url: '{{ route('monan.destroy', ':id') }}'.replace(':id', id),
                success: function(data) {
                    $('#row_monan_' + id).remove();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('monan.store') }}",
                data: $('#form_monan').serialize(),
                    contentType: false,
                    processData: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
            }).done(function(res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value) {
                        $('span.' + key + '_err').text(value[0]);
                    });
                } else {
                    // console.log(res);
                    var html = '<tr id="row_monan_' + res.data.id + '">';
                    html += '<td>' + res.data.id + '</td>';
                    html += '<td><img src="{{ asset('images/') }}/' + res.data.hinhanh +
                        '" alt="" width="100px"></td>';
                    // html += '<td>' + res.data.hinhanh + '</td>';
                    html += '<td>' + res.data.tenmonan + '</td>';
                    html += '<td>' + res.data.gia + '</td>';
                    if (res.data.tinhtrang == 1) {
                        html += '<td><span class="badge badge-success">Còn bán</span></td>';
                    } else {
                        html += '<td><span class="badge badge-danger">Hết</span></td>';
                    }

                    // html += '<td>' + res.data.created_at + '</td>';

                    html += '<td>' + res.data.donvitinh + '</td>';

                    $.each(res.list_danhmuc, function(value) {
                        if (res.data.danhmuc == res.list_danhmuc[value].id) {
                            html += '<td>' + res.list_danhmuc[value].tendm + '</td>';
                        }
                    });

                    html += '<td>' +
                        '<button type="button" id="edit_monan" class="btn btn-primary mr-1" data-id="' +
                        res.data.id + '">Sửa</button>' +
                        '<button type="button" id="delete_monan" class="btn btn-danger" data-id="' +
                        res.data.id + '">Xóa</button>' + '</td>';
                    html += '</tr>';
                    // sửa
                    if ($('#id').val()) { //id hidden
                        $('#row_monan_' + res.data.id).replaceWith(html); // thay thế
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Sửa thành công');
                    } else {
                        $('#list_monan').prepend(html); // thêm vào đầu
                        $('#message').addClass('alert alert-success');
                        $('#message').html('Thêm thành công');
                    }

                    $('#form_monan').trigger('reset');
                    $('#modal_monan').modal('hide');

                    setTimeout(function() {
                        $('#message').removeClass('alert alert-success');
                        $('#message').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection --}}


{{-- @extends('layouts.admin')
@section('content_admin')
    <div class="container-fluid">
        <div class="col-lg-6">
            <a href="{{ route('monan.create') }}">
                <button class="btn btn-success" style="margin-bottom: 15px;">Thêm</button>
            </a>
        </div>
        <h3 class="text-center">DANH SÁCH MÓN ĂN</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã món ăn</th>
                    <th>Hình ảnh</th>
                    <th>Tên món</th>
                    <th>Giá</th>
                    <th>Tình trạng</th>
                    <th>Ngày thêm</th>
                    <th>ĐVT</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ asset('images/' . $item->hinhanh) }}" alt="" width="100px"></td>
                    
                        <td>{{ $item->tenmonan }}</td>
                        
                        <td>{{ $item->gia }}</td>
                        <td>
                            @if ($item->tinhtrang == 1)
                                <span class="badge badge-success">Còn bán</span>
                            @else
                                <span class="badge badge-danger">Hết bán</span>
                            @endif
                        </td>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>

                        <td>{{ optional($item->donvitinhs)->tendvt }}</td>
                        <td>{{ optional($item->monanss)->tendm }}</td>

                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection --}}
