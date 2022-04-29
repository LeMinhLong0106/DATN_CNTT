<div id="tableDetails">
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
    {{-- <div id="showSelectedTable">
    </div> --}}

    {{-- <div id="showSelectedMenuAndTable">

    </div> --}}

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
                    <span id="form_message"></span>
                    {{-- <div class="form-group">
                            <label>Danh mục</label>
                            <select name="category_name" id="category_name" class="form-control" required
                                data-parsley-trigger="change">
                                <option value="">Chọn danh mucn món</option>

                                @foreach ($danhmucs as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tendm }}
                                    </option>
                                @endforeach

                            </select>
                        </div> --}}
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
                    <input type="hidden" name="hidden_order_id" id="hidden_order_id" />
                    <input type="hidden" name="hidden_product_rate" id="hidden_product_rate" />
                    <input type="hidden" name="hidden_table_name" id="hidden_table_name" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.table_button').click(function() {
            var table_id = $(this).data('table_id');
            $('#hidden_table_id').val(table_id);
            $('#modal_title').text('Thêm món ăn cho bàn ' + table_id);
            $('#order_form')[0].reset();
            $('#form_message').html('');
            $('#submit_button').val('Add');
            $('#action').val('Add');
            $('#orderModal').modal('show');

            $.get('/order/getSaleDetails/' + table_id, function(data) {
                $("#showSelectedMenuAndTable").html(data);
            });
        });

        $('#order_form').on('submit', function(event) {
            event.preventDefault();
            var table_id = $('#hidden_table_id').val();
            var product_name = $('#product_name').val();
            var product_quantity = $('#product_quantity').val();
            var product_note = $('#product_note').val();
            // var action = $('#action').val();

            $.ajax({
                url: "{{ route('order.orderFood') }}",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    table_id: table_id,
                    product_name: product_name,
                    product_quantity: product_quantity,
                    product_note: product_note,
                    // action: action,
                },
                success: function(data) {
                    $('#order_form')[0].reset();
                    $('#orderModal').modal('hide');
                    $('#showSelectedMenuAndTable').html(
                        data); //show selected menu and table
                }
            });
            event.stopImmediatePropagation(); //stop submit form
        });

        $('#showSelectedMenuAndTable').on('click', '.btnConfirmOrder', function(event) {
            SALE_ID = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('order.confirmOrder') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "sale_id": SALE_ID
                },
                success: function(result) {
                    $("#showSelectedMenuAndTable").html(result);
                }
            })
            event.stopImmediatePropagation();
        });

        $('#showSelectedMenuAndTable').on('click', '.btnDeleteOrder', function(event) {
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
            event.stopImmediatePropagation();
        });

        $('#tableDetails').on('click', '.table_button', function() {
            var table_id = $(this).data('table_id');
            $('#showSelectedTable').html("<h3>Bàn: " + table_id + "</h3>");

            // $.get('/order/getSaleDetails/' + table_id, function(data) {
            //     $("#showSelectedMenuAndTable").html(data);
            // })
        });

        // 
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
