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
            <h3>CẬP NHÂT MÓN ĂN</h3>
            <form action="{{ route('monan.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-horizontal">
                    <hr />
                    <div class="form-group1">
                        <label for="tenmonan" class="control-label col-md-4"><b>Tên món ăn: </b></label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $data->tenmonan }}" class="form-control text-box single-line"
                                id="tenmonan" name="tenmonan">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="gia" class="control-label col-md-4"><b>Giá: </b></label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $data->gia }}" class="form-control text-box single-line"
                                id="gia" name="gia">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="mota" class="control-label col-md-4"><b>Mô tả: </b></label>
                        <div class="col-md-8">
                            {{-- <textarea id="mota" class="form-control text-box" name="mota" rows="3"></textarea> --}}
                            <textarea id="mota" class="form-control text-box" name="mota">{{ $data->mota }}</textarea>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="hinhanh" class="control-label col-md-4"><b>Ảnh món ăn: </b></label>
                        <div class="col-md-8">
                            <input type="file" value="{{ $data->hinhanh }}" id="hinhanh" name="hinhanh">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="tinhtrang" class="control-label col-md-4"><b>Tình trạng: </b></label>
                        <div class="col-md-8">
                            <input type="radio" name="tinhtrang" value="1" {{ $data->tinhtrang == 1 ? 'checked' : '' }}>
                            Còn
                            <input type="radio" name="tinhtrang" value="0" {{ $data->tinhtrang == 0 ? 'checked' : '' }}>
                            Hết
                        </div>
                    </div>
                    <div class="form-group1">
                        <label for="donvitinh" class="control-label col-md-4"><b>Đơn vị tính: </b></label>
                        <div class="col-md-8">
                            <select name="donvitinh" class="form-control">
                                @foreach ($donvitinhs as $dvt)
                                    <option {{ $dvt->id == $data->donvitinh ? 'selected' : '' }}
                                        value="{{ $dvt->id }}">{{ $dvt->tendvt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="danhmuc" class="control-label col-md-4"><b>Loại món ăn: </b></label>
                        <div class="col-md-8">
                            <select name="danhmuc" class="form-control">
                                @foreach ($danhmucs as $key => $dm)
                                    <option {{ $dm->id == $data->danhmuc ? 'selected' : '' }}
                                        value="{{ $dm->id }}">{{ $dm->tendm }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="align-items: baseline;">
                        <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                            <input type="submit" name="them" value="Cập nhật" class="btn btn-primary" />
                        </div>

                        <div class="col-md-offset-2 col-md-6 comback_div">
                            <a class="comeback" href="{{ route('monan.index') }}">Quay lại</a>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
