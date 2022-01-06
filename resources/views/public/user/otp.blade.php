@extends('public.user.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/login.css') }}" >
@endpush
@section('content')

<section class="login login-enter-otp d-flex flex-column">
		<div class="container">
			<div class="d-flex flex-column justify-content-center">
				<div class="text-left color-se">
					<h1 class="header">Nhập mã OTP</h1>
					<p>Mã OTP sẽ được gửi đến số điện thoại của bạn</p>
				</div>	
			</div>
			<form class="form-login-otp" action="#" method="post">
				<div class="form-group d-flex">
					<input type="number" name="codeOTP[]" maxlength="1" value="" autofocus required/>
					<input type="number" name="codeOTP[]" maxlength="1" value="" required />
					<input type="number" name="codeOTP[]" maxlength="1" value="" required />
					<input type="number" name="codeOTP[]" maxlength="1" value="" required />
					<input type="number" name="codeOTP[]" maxlength="1" value="" required />
					<input type="number" name="codeOTP[]" maxlength="1" value="" required />
				</div>
				<div class="mt-45">
					<p class="color-bl-2 font-weight-bold">Gửi lại mã OTP (00:29)</p>
				</div>
				<button type="submit" class="btn btn-pr mt-45 mb-3">Xác nhận</button>
			</form>
		</div>
		<div class="footer text-center mt-auto">
			<p>Bạn chưa có tài khoản <a class="color-pr" href="{{ route('register') }}">Đăng ký</a></p>
			<a class="color-pr font-weight-bold" href="#">Hotline: 19007634</a>
		</div>
	</section>

@endsection
@push('js')
<script src="{{ asset('public/js/otp.js') }}"></script>
@endpush