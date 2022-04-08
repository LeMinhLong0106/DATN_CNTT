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
            <form action="{{route('monan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-horizontal">
                    <hr />
                    <div class="form-group1">
                        <label for="mama" class="control-label col-md-4"><b>Mã món ăn: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="mama" name="mama">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="tenma" class="control-label col-md-4"><b>Tên món ăn: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="tenma" name="tenma">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="dongia" class="control-label col-md-4"><b>Giá: </b></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control text-box single-line" id="dongia" name="dongia">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="mota" class="control-label col-md-4"><b>Mô tả: </b></label>
                        <div class="col-md-8">
                            {{-- <input type="text" class="form-control text-box single-line" id="mota" name="mota"> --}}
                            <textarea id="mota" class="form-control text-box" name="mota" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="hinh" class="control-label col-md-4"><b>Ảnh món ăn: </b></label>
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
                        <label for="tinhtrang" class="control-label col-md-4"><b>Tình trạng: </b></label>
                        <div class="col-md-8">
                            <input type="checkbox" name="tinhtrang" value="1"> Còn hàng
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="donvitinh" class="control-label col-md-4"><b>Đơn vị tính: </b></label>
                        <div class="col-md-8">
                            <select name="donvitinh" class="form-control text-box single-line">
                                <option value="" class="form-control">Đơn vị tính</option>
                                @foreach ($donvitinh as $dm)
                                    <option value="{{ $dm->MaDVT }}" class="form-control">{{ $dm->TenDVT }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="danhmucma" class="control-label col-md-4"><b>Loại món ăn: </b></label>
                        <div class="col-md-8">
                            <select name="danhmucma" class="form-control text-box single-line">
                                <option value="" class="form-control">Danh mục món ăn</option>
                                @foreach ($danhmuc as $dm)
                                    <option value="{{ $dm->MaMDMA }}" class="form-control">{{ $dm->TenDMMA }}</option>
                                @endforeach
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
