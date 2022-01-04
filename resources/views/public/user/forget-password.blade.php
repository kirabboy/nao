@extends('public.user.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/forget-password.css') }}" >
@endpush
@section('content')

<section class="forget-password m-h-820 d-flex flex-column">
    <div class="container">
        <div class="d-flex flex-column justify-content-center">
            <div class="text-center">
                <img src="{{ asset('public/uploads/logo.png') }}" alt="">
            </div>	
            <div class="title mt-2 text-center">
                <span>Quên mật khẩu</span>
            </div>
            <div class="title-sub mt-2 text-center">
                <span>Điền thông tin số điện thoại để nhận mã OTP</span>
            </div>
        </div>
        <form class="form-register mt-45" action="#" method="post">
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control custom-input" placeholder="Số điện thoại">
            </div>
            <button type="submit" name="register-submit" class="btn btn-pr mt-45 mb-3">Tiếp tục</button>
        </form>
        <div class="d-flex flex-column justify-content-center">
            <a href="{{ route('login') }}" class="text-center color-pr font-weight-semibold text-18 mt-2" href="#">Đăng nhập</a>
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