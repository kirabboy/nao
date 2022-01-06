@extends('public.user.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/login.css') }}" >
@endpush
@section('content')

<section class="login d-flex flex-column">
    <div class="container">
        <div class="d-flex flex-column justify-content-center">
            <div class="text-center">
                <img src="{{ asset('public/uploads/logo-slugun.png') }}" alt="">
            </div>	
            <div class="login-title text-center">
                <span>Đăng nhập bằng OTP</span>
            </div>
        </div>
        <form class="form-login" action="{{ route('otp') }}" method="get">
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control custom-input" placeholder="Số điện thoại">
            </div>
            <button type="submit" class="btn btn-pr mt-45 mb-3">Đăng nhập</button>
        </form>
        <div class="d-flex flex-column justify-content-center">
            <a href="{{ route('login.otp') }}" class="text-center mb-3 color-pr text-underline" href="#">Đăng nhập bằng mật khẩu</a>
            <a href="{{ route('register') }}" class="text-center color-pr font-weight-semibold text-18" href="#">Đăng ký</a>
        </div>
    </div>
    <div class="footer text-center mt-auto">
        <a class="color-pr font-weight-bold" href="#">Hotline: 19007634</a>
    </div>
</section>

@endsection
@push('js')
<script src="{{ asset('public/js/otp.js') }}"></script>
@endpush