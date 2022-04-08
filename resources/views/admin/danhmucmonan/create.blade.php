@extends('layouts.admin')

@section('content_admin')
    <style>
        .checkform {
            display: flex;
            justify-content: center;
            margin-top: 2rem;

        }

        .content {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 20px;
            border-radius: 8px;
            /* display: ; */
        }

        .title {
            padding-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            display: flex;
            margin-bottom: 0.2rem;
            /* justify-content: center; */
            text-align: center;
            margin-top: 1.5rem;
        }

        .form-group1 {
            display: flex;
            /* justify-content: ; */
            align-items: baseline;
            margin-bottom: 0.2rem;
        }

        h3 {
            text-align: center;
        }

        .comeback {
            border: none;
            outline: none;
            background-color: #eaecf4;
            border-radius: 6px;
            padding: 5px;

        }

        .comeback>a {
            text-decoration: none;
        }

    </style>
    <div class="checkform">
        <div class="content">
            <h3>THÊM MỚI ĐỒ UỐNG</h3>
            <form action="DoUong/Store" method="post" enctype="multipart/form-data">
                <div class="form-horizontal">
                    <hr />
                    <div class="form-group1">
                        <label for="madu" class="control-label col-md-4"><b>Mã đồ uống: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="madu" name="madu" readonly>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="tendu" class="control-label col-md-4"><b>Tên đồ uống: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="tendu" name="tendu">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="dongia" class="control-label col-md-4"><b>Giá: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="dongia" name="dongia">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="hinh" class="control-label col-md-4"><b>Ảnh đồ uống: </b></label>
                        <div class="col-md-8">
                            <input type="file" id="hinh" name="hinh">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="ngaythem" class="control-label col-md-4"><b>Ngày thêm: </b></label>
                        <div class="col-md-8">
                            <input type="date" class="form-control text-box single-line" id="ngaythem" name="ngaythem">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="banchay" class="control-label col-md-4"><b>Bán chạy: </b></label>
                        <div class="col-md-8">
                            <input type="checkbox" name="banchay" value="1"> Bán chạy
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="loaiDU" class="control-label col-md-4"><b>Loại đồ uống: </b></label>
                        <div class="col-md-8">
                            <select name="loaiDU" class="form-control text-box single-line">
                                <option value="1" class="form-control">1</option>
                                <option value="2" class="form-control">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="align-items: baseline;">
                        <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                            <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                        </div>

                        <div class="col-md-offset-2 col-md-6 comback_div">
                            <a class="comeback" href="{{ route('ban.index') }}">Quay lại</a>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
