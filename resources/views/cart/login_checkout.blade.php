@extends('layouts.main')
@section('main')
    <div class="login-form-container">
        <form action="{{ route('login_khachhang') }}" method="POST">
            @csrf
            <h3>Đăng nhập</h3>
            <input type="email" name="email_account" placeholder="enter your email" class="box">
            <input type="password" name="password_account" placeholder="enter your password" class="box">
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" value="login now" class="btn">
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a href="{{ route('register_checkout') }}">create one</a></p>
            
            <a href="{{url('/redirectToFaceBook')}}" class="btn btn-primary btn-block">Đăng nhập FB</a>
            
        </form>
    </div>
@endsection
