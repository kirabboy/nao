@extends('public.user.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/register.css') }}" >
@endpush
@section('content')

<section class="register d-flex flex-column">
	<div class="container">
		<div class="d-flex flex-column justify-content-center">
			<div class="text-center">
				<img src="{{ asset('public/uploads/logo.png') }}" alt="">
			</div>	
			<div class="register-title mt-2 text-center">
				<span>Đăng ký tài khoản</span>
			</div>
		</div>
		<form class="form-register mt-45" action="{{route('post.register')}}" method="POST">
		{{-- Thong bao dang nhap --}}
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $err)
						{{ $err }}<br>
					@endforeach
				</div>
			@endif

			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}</strong>
			</div>
			@endif
		{{-- End thong bao dang nhap --}}
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="phone" name="phone" class="form-control custom-input" placeholder="Số điện thoại">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mật khẩu</label>
				<input type="password" name="password" class="form-control custom-input" placeholder="Mật khẩu">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mã giới thiệu</label>
				<input type="text" name="magioithieu" class="form-control custom-input" placeholder="Mã giới thiệu"
				@if ($mgt != null)
					value="{{$mgt}}" readonly
				@else

				@endif
				>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="rememberMe">
				<label class="form-check-label" for="rememberMe">Tôi đồng ý các <a href="#" class="color-pr font-weight-bold">chính sách và điều khoản đăng ký</a></label>
			</div>

			<button type="submit" name="register-submit" disabled class="btn btn-pr mt-45 mb-3">Tiếp tục</button>
		@csrf
		</form>
		<div class="d-flex flex-column justify-content-center">
			<a class="text-center color-pr font-weight-semibold text-18 mt-2" href="{{ route('login') }}">Đăng nhập</a>
		</div>
	</div>
	<div class="footer text-center mt-auto">
		<a class="color-pr font-weight-bold" href="#">Hotline: 19007634</a>
	</div>
</section>

@endsection
@push('js')
<script src="{{ asset('public/js/register.js') }}"></script>
@endpush