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
            <form action="{{ route('ban.store') }}" method="post">
                @csrf
                <div class="form-horizontal">
                    <hr />
                    {{-- <div class="form-group1">
                        <label for="MaBan" class="control-label col-md-5"><b>Mã bàn: </b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control text-box single-line" id="MaBan" name="MaBan">
                        </div>
                    </div> --}}

                    <div class="form-group1">
                        <label for="ghe" class="control-label col-md-5"><b>Số ghế: </b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control text-box single-line" id="ghe" name="ghe">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="tinhtrang" class="control-label col-md-5"><b>Tình trạng: </b></label>
                        <div class="col-md-7">
                            <input type="radio" name="tinhtrang" value="1" checked> Enable
                            <input type="radio" name="tinhtrang" value="0"> Disable
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
