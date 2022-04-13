@extends('layouts.admin')

@section('js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Chọn vai trò",
        })
    </script>
@endsection


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
            <h3>THÊM MỚI NHÂM VIÊN</h3>
            <form action="{{route('nhanvien.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-horizontal">
                    <hr />
                    <div class="form-group1">
                        <label for="name" class="control-label col-md-4"><b>Tên nhân viên: </b></label>
                        <div class="col-md-8">
                            <input type="text" value="{{ $data->name }}" class="form-control text-box single-line"
                                id="name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="email" class="control-label col-md-4"><b>Email: </b></label>
                        <div class="col-md-8">
                            <input type="email" value="{{ $data->email }}" class="form-control text-box single-line"
                                id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="password" class="control-label col-md-4"><b>Mật khẩu: </b></label>
                        <div class="col-md-8">
                            {{-- <input type="text" class="form-control text-box single-line" id="password" name="password"> --}}
                            <input type="password" id="password" class="form-control text-box" name="password" required>
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="vaitro" class="control-label col-md-4"><b>Vai trò: </b></label>
                        <div class="col-md-8">
                            <select name="vaitro_id[]" class="form-control tags_select_choose" multiple>
                                <option value=""></option>
                                @foreach ($vaitros as $vt)
                                    <option {{ $nhanvien_vaitro->contains('id', $vt->id) ? 'selected' : '' }}
                                        value="{{ $vt->id }}">{{ $vt->tenvaitro }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group" style="align-items: baseline;">
                        <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                            <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                        </div>

                        <div class="col-md-offset-2 col-md-6 comback_div">
                            <a class="comeback" href="{{ route('nhanvien.index') }}">Quay lại</a>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
