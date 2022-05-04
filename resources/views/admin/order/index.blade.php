@extends('layouts.admin')

@section('content_admin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Danh sách đặc món</h1>
        <div class="row">
            <div class="col col-sm-4">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">Tình trạng bàn</div>
                    <div class="card-body" id="table_status">

                    </div>
                </div>
            </div>
            <div class="col col-sm-8">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">Tình trạng order</div>

                    <div class="card-body">
                        <h3 id="showSelectedTable"></h3>
                        <div class="table-responsive" id="showSelectedMenuAndTable">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // fetch_data();
            fetch_table_status();

            // function fetch_data() {
            //     $.ajax({
            //         url: "{{ route('order.order_status') }}",
            //         method: "GET",
            //         success: function(data) {
            //             $('#order_status').html(data);
            //         }
            //     })
            // }

            function fetch_table_status() {
                $.ajax({
                    url: "{{ route('order.table_status') }}",
                    method: "GET",
                    success: function(data) {
                        $('#table_status').html(data);
                    }
                })
            }


        });
    </script>
@endsection
