@extends('layouts.main')
@section('main')
    <div class="login-form-container">
        <form action="{{route('add_khachhang')}}" method="POST" role="form">
            @csrf
            <h3>Đăng Ký</h3>
            <div class="form-group">
                <input class="box" placeholder="Nhập tên" name="tenkh">
            </div>
            <div class="form-group">
                <input class="box" placeholder="Nhập email" name="email">
            </div>
            <div class="form-group">
                <input class="box" placeholder="Nhập số điện thoại" name="sdt">
            </div>
            <div class="form-group">
                <input class="box" placeholder="Nhập địa chỉ" name="diachi">
            </div>
            <div class="form-group">
                <input class="box" placeholder="Nhập mật khẩu" name="matkhau">
            </div>
            {{-- <div class="form-group">
                <input class="box" placeholder="Xác nhận mật khẩu" name="comfirm_password">
            </div> --}}

            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <a href="{{route('login_checkout')}}">Đăng nhập</a>

        </form>
    </div>
@endsection
