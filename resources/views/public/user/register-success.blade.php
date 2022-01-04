@extends('public.user.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/login.css') }}" >
@endpush
@section('content')

<section class="login login-enter-otp d-flex flex-column">
		<div class="container">
			<div class="d-flex flex-column justify-content-center">
				<div class="text-left color-se">
					<h1 class="header">Hoàn tất đăng ký</h1>
				</div>	
			</div>
			<form class="form-login" action="#" method="post">
				<div class="form-group">
					<label>Số điện thoại</label>
					<input type="text" class="form-control custom-input" placeholder="Số điện thoại">
				</div>
				<div class="form-group form-group-input-icon">
					<label for="exampleInputPassword1">Mật khẩu</label>
					<input type="password" class="form-control custom-input" placeholder="Mật khẩu">
					<i class="fa fa-eye-slash" aria-hidden="true"></i>
				</div>
				<div class="form-group form-group-input-icon">
					<label for="exampleInputPassword1">Nhập lại mật khẩu</label>
					<input type="password" class="form-control custom-input" placeholder="Nhập lại mật khẩu">
					<i class="fa fa-eye-slash" aria-hidden="true"></i>
				</div>
				<button type="submit" class="btn btn-pr mt-45 mb-3">Xong</button>
			</form>
		</div>
		<div class="footer text-center mt-auto">
			<p>Bạn đã có tài khoản <a class="color-pr" href="{{ route('login') }}">Đăng nhập</a></p>
			<a class="color-pr font-weight-bold" href="#">Hotline: 19007634</a>
		</div>
	</section>

@endsection
@push('js')
<script src="{{ asset('public/js/register.js') }}"></script>
@endpush