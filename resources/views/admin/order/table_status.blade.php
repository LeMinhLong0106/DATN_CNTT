<div>
    @foreach ($bans as $b)
        {{-- đổi màu bàn --}}
        @if ($b->tinhtrang == 0)
            <button type="button" name="table_button" class="btn btn-secondary mb-4 table_button" data-toggle="modal"
                data-table_id="{{ $b->id }}">
                Bàn: {{ $b->id }}
                <br>
                {{ $b->ghe }} ghế
            </button>
        @else
            <button type="button" name="table_button" class="btn btn-warning mb-4 table_button" data-toggle="modal"
                data-table_id="{{ $b->id }}">
                Bàn: {{ $b->id }}
                <br>
                {{ $b->ghe }} ghế
            </button>
        @endif
    @endforeach

</div>



<div id="orderModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="order_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Thêm món ăn</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {{-- <span id="form_message"></span> --}}
                    <div class="form-group">
                        <label>Món ăn</label>
                        <select name="product_name" id="product_name" class="form-control" required>
                            <option value="">Chọn món ăn</option>
                            @foreach ($monans as $monan)
                                <option value="{{ $monan->id }}" class="form-control">{{ $monan->tenmonan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" name="product_quantity" id="product_quantity" class="form-control"
                            min="1" required>
                    </div>

                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="product_note" id="product_note" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_table_id" id="hidden_table_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        function fetch_table_status() {
            $.ajax({
                url: "{{ route('order.table_status') }}",
                method: "GET",
                success: function(data) {
                    $('#table_status').html(data);
                }
            })
        }

        // nhấn hiển thị thông tin bàn
        $('.table_button').click(function() {
            var table_id = $(this).data('table_id');
            $('#hidden_table_id').val(table_id);
            $('#modal_title').text('Thêm món ăn cho bàn ' + table_id);
            // $('#order_form')[0].reset();
            $('#submit_button').val('Thêm');
            $('#orderModal').modal('show');

            $.get('/order/getSaleDetails/' + table_id, function(data) {
                $("#showSelectedMenuAndTable").html(data);
            });

            $('#showSelectedTable').html("<h3>Bàn: " + table_id + "</h3>");

        });
        // thêm món ăn
        $('#order_form').on('submit', function(e) {
            e.preventDefault();
            var table_id = $('#hidden_table_id').val();
            var product_name = $('#product_name').val();
            var product_quantity = $('#product_quantity').val();
            var product_note = $('#product_note').val();
            $.ajax({
                url: "{{ route('order.orderFood') }}",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    table_id: table_id,
                    product_name: product_name,
                    product_quantity: product_quantity,
                    product_note: product_note,
                },
                success: function(data) {
                    $('#order_form')[0].reset();
                    $('#orderModal').modal('hide');
                    $('#showSelectedMenuAndTable').html(data);

                    setTimeout(() => {
                        fetch_table_status();
                    }, 2000);
                }
            });
            e.stopImmediatePropagation(); //stop submit form
        });
        // xác nhận món ăn nấu xong
        $('#showSelectedMenuAndTable').on('click', '.btnConfirmOrder', function(e) {
            SALE_ID = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('order.confirmOrder') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "sale_id": SALE_ID
                },
                success: function(result) {
                    // console.log(result);
                    $("#showSelectedMenuAndTable").html(result);
                }
            })
            e.stopImmediatePropagation();
        });
        // xóa món ăn
        $('#showSelectedMenuAndTable').on('click', '.btnDeleteOrder', function(e) {
            SALE_ID = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('order.deleteOrder') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "sale_id": SALE_ID
                },
                success: function(result) {
                    $("#showSelectedMenuAndTable").html(result);
                }
            })
            e.stopImmediatePropagation();
        });
        // nhấn nút thanh toán
        $('#btn_savePayment').click(function(e) {
            sales_id = SALES_ID
            $.ajax({
                type: "POST",
                url: "/cashier/savePayment",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "saleid": sales_id,
                },
                success: function(result) {

                    window.location.href = result;
                }
            })


            e.stopImmediatePropagation();
        })
        // nhân nút tăng số lượng
        $('#showSelectedMenuAndTable').on('click', '.increment-btn', function(e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value; //nếu không phải số thì gán bằng 0
            if (value < 10) {
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value); //update value
            }
        });
        $('#showSelectedMenuAndTable').on('click', '.changeQuantityIn', function(e) {
            e.preventDefault();
            var quantity = $(this).parents('.quantity').find('.qty-input').val();
            var sale_id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('order.changeQuantityIn') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "sale_id": sale_id,
                    "quantity": quantity
                },
                success: function(result) {
                    $("#showSelectedMenuAndTable").html(result);
                }
            })
        });
        // nhấn nút giảm số lượng
        $('#showSelectedMenuAndTable').on('click', '.decrement-btn', function(e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
        $('#showSelectedMenuAndTable').on('click', '.changeQuantityDe', function(e) {
            e.preventDefault();

            var quantity = $(this).parents('.quantity').find('.qty-input').val();
            var sale_id = $(this).data('id');
            // if (quantity > 1) {
            $.ajax({
                type: "POST",
                url: "{{ route('order.changeQuantityDe') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "sale_id": sale_id,
                    "quantity": quantity
                },
                success: function(result) {
                    $("#showSelectedMenuAndTable").html(result);
                }
            })
            // }

        });

    });
</script>

{{-- <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn món ăn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn món ăn</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                @foreach ($monans as $m)
                                    <option value="{{ $m->id }}">{{ $m->tenmonan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn số lượng</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script>
    $(document).ready(function () {
        $('.table_button').click(function () {
            var table_id = $(this).data('table_id');
            $('#showSelectedTable').html('');
            $.ajax({
                url: '{{ route('admin.order.table_details') }}',
                type: 'get',
                data: {
                    'table_id': table_id
                },
                success: function (data) {
                    $('#showSelectedTable').html(data);
                }
            });
        });
    });
</script> --}}
