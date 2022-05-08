@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h3 class="text-center">DANH SÁCH HĐ</h3>
        <table class="table table-striped table-class" id="dataTable">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Số bàn</th>
                    <th>Ngày đặt</th>
                    <th>Nhân viên phục vụ</th>
                    <th>Nhân viên thu ngân</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ban_id }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->nhanvien_id }}</td>
                        <td>{{ $item->nhanvien_tn }}</td>
                        <td>{{ $item->tongtien }}</td>
                        <td>
                            @if ($item->tinhtrang == 0)
                                <span class="badge badge-danger">Chưa thanh toán</span>
                            @else
                                <span class="badge badge-success">Đã thanh toán</span>
                            @endif
                        <td>
                            @if ($item->tinhtrang == 0)
                                <button type="button" data-id="{{ $item->id }}"
                                    class="btn btn-primary btn-circle btn-sm edit_hd" data-toggle="modal">
                                    <i class="fas fa-edit"></i></button>
                                <button data-id="{{ $item->id }}" class="btn btn-danger btn-circle btn-sm delete_hd">
                                    <i class="fas fa-times"></i></button>
                            @else
                                <button data-id="{{ $item->id }}" class="btn btn-danger btn-circle btn-sm delete_hd"><i
                                        class="fas fa-times"></i></button>
                                <a class="btn btn-warning btn-circle btn-sm"
                                    href="{{ route('hdtaiquay.showReceipt', [$item->id]) }}">
                                    <i class="fas fa-eye"></i></a>
                            @endif


                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editHD" tabindex="-1" role="dialog" aria-labelledby="editHDLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editHDLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="cthd_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên món ăn</th>
                                <th>Số lượng</th>
                                <th>Ghi chú</th>
                                <th>Tổng tiền</th>
                                {{-- <th>Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody id="cthd_table_body">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="btnpayment_id">
                    <button type="submit" class="btn btn-primary btnpayment">Thanh toán</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Model xóa --}}
    <div class="modal fade" id="deleteHD" tabindex="-1" role="dialog" aria-labelledby="deleteHDLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteHDLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_hd_id">
                    <h4>Bạn có chắc chắn muốn xóa hóa đơn này?</h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary delete_hd_btn">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.edit_hd', function(evet) {
            var id = $(this).data('id');
            $('#btnpayment_id').val(id); // gán id vào input
            // console.log(id);
            $.ajax({
                url: '{{ route('hdtaiquay.showHDTQ', ':id') }}'.replace(':id', id),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log(data.cthd);
                    $('#editHDLabel').html('Sửa hóa đơn ' + id);
                    $('#editHD').modal('show');

                    var html = '';
                    $.each(data.cthd, function(key, item) {
                        html += '<tr>';
                        html += '<td>' + item.id + '</td>';
                        html += '<td>' + item.monan_id + '</td>';
                        html += '<td>' + item.soluong + '</td>';
                        if (item.ghichu == null) {
                            html += '<td> </td>';
                        } else {
                            html += '<td>' + item.ghichu + '</td>';
                        }
                        html += '<td>' + item.soluong * item.giaban + '</td>';
                        // html +=
                        //     '<td><button type="button" class="btn btn-danger btn-circle delete_cthd" data-id="' +
                        //     item.id + '">Xóa</button></td>';
                        html += '</tr>';
                        html += '</tr>';
                    });
                    html += '<tr>';
                    html += '<td colspan="4" class="text-right"><b>Tổng:</b></td>';
                    html += '<td colspan="2">' + data.data.tongtien + '</td>';
                    html += '</tr>';

                    $('#cthd_table_body').html(html);

                }
            });
        });


        // Xóa ct hd
        $(document).on('click', '.delete_cthd', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '/hdtaiquay/deleteCTHD/' + id,
                type: 'DELETE',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(data) {
                    console.log(data);

                }
            });
        });

        // nhấn nút xóa của hóa đơn hiển thị modal 
        $(document).on('click', '.delete_hd', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            // alert(id);
            $('#deleteHD').modal('show');
            $('#delete_hd_id').val(id);
        });

        // nhấn nút xóa trong modal hóa đơn
        $(document).on('click', '.delete_hd_btn', function(event) {
            event.preventDefault();
            var id = $('#delete_hd_id').val();
            // alert(id);
            $.ajax({
                type: "DELETE",
                url: "/hdtaiquay/deleteHD/" + id,
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(result) {
                    $("#deleteHD").modal('hide');
                    // $("#cthd_table_body").html(result);
                }
            })
        });

        // nhấn nút thanh toán
        $(document).on('click', '.btnpayment', function(event) {
            event.preventDefault();
            var id = $('#btnpayment_id').val();
            // console.log(id);
            $.ajax({
                type: "POST",
                url: '{{ route('hdtaiquay.thanhtoan', ':id') }}'.replace(':id', id),
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(result) {
                    window.location.href = result;
                }
            })

            event.stopImmediatePropagation();
        });
    </script>
@endsection
