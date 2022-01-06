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
				<span>Đăng nhập bằng mật khẩu</span>
			</div>
		</div>
		<form class="form-login" action="#" method="get">
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" class="form-control custom-input" placeholder="Số điện thoại">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mật khẩu</label>
				<input type="password" class="form-control custom-input" placeholder="Mật khẩu">
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="rememberMe">
						<label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label>
					</div>
				</div>
				<div class="forget-password">
					<a href="{{ route('forget.password') }}">Quên mật khẩu ?</a>
				</div>
			</div>

			<button type="submit" class="btn btn-pr mt-45 mb-3"><a href="profile" class="text-light">Đăng nhập</a></button>
		</form>
		<div class="d-flex flex-column justify-content-center">
			<a class="text-center mb-3 color-pr text-underline" href="{{ route('login.otp') }}">Đăng nhập bằng mã OTP</a>
			<a class="text-center color-pr font-weight-semibold text-18" href="{{ route('register') }}">Đăng ký</a>
		</div>
	</div>
	<div class="footer text-center mt-auto">
		<a class="color-pr font-weight-bold" href="#">Hotline: 19007634</a>
	</div>
</section>
	<!-- Modal -->
	<div class="modal fade modal-alert" id="ModalLoginAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body d-flex success">
					<div class="mr-2">
						<i class="fa fa-check-circle" aria-hidden="true"></i>	
					</div>
					<div>
						<p class="font-weight-bold">Đăng nhập thành công</p>
						<p>Chúc mừng bạn đã đăng nhập thành công</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@push('js')
<script src="{{ asset('public/js/login.js') }}"></script>
@endpush