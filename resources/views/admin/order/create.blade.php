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
            <h3>THÊM MỚI MÓN ĂN</h3>
            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-horizontal">
                    <hr />
                    {{-- <div class="form-group1">
                        <label for="danhmuc" class="control-label col-md-4"><b>Loại món ăn: </b></label>
                        <div class="col-md-8">
                            <select name="danhmuc" class="form-control text-box single-line">
                                <option value="" class="form-control">Danh mục món ăn</option>
                                @foreach ($danhmucs as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tendm }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="form-group1">
                        <label for="ban_id" class="control-label col-md-4"><b>Bàn: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="ban_id"
                                name="ban_id">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="monan" class="control-label col-md-4"><b>Món ăn: </b></label>
                        <div class="col-md-8">
                            <select name="monan" class="form-control text-box single-line">
                                <option value="" class="form-control">Chọn món ăn</option>
                                @foreach ($monans as $dm)
                                    <option value="{{ $dm->id }}" class="form-control">{{ $dm->tenmonan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="soluong" class="control-label col-md-4"><b>Số lượng: </b></label>
                        <div class="col-md-8">
                            <input type="number" class="form-control text-box single-line" id="soluong" name="soluong"
                                min="1">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="tinhtrang" class="control-label col-md-4"><b>Tình trạng: </b></label>
                        <div class="col-md-8">
                            <input type="radio" name="tinhtrang" value="1"> Chờ xử lý
                            <input type="radio" name="tinhtrang" value="0"> Đã xử lý
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="ghichu" class="control-label col-md-4"><b>Ghi chú: </b></label>
                        <div class="col-md-8">
                            {{-- <input type="text" class="form-control text-box single-line" id="ghichu" name="ghichu"> --}}
                            <textarea id="ghichu" class="form-control text-box" name="ghichu" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="nhanvien_id" class="control-label col-md-4"><b>Nhaan vieen: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="id"
                                name="nhanvien_id">
                        </div>
                    </div>

                    <div class="form-group" style="align-items: baseline;">
                        <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                            <input type="submit" name="them" value="Thêm món" class="btn btn-primary" />
                        </div>

                        <div class="col-md-offset-2 col-md-6 comback_div">
                            <a class="comeback" href="{{ route('order.index') }}">Quay lại</a>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
