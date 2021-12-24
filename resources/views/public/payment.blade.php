@extends('public.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/payment.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/navigation.css') }}" />
@endpush
@section('content')
<div class="container">
    <div class="navigation d-flex align-items-center">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <h3>Thanh toán</h3>
    </div>
</div>
<div class="container mt-30 payment">
    <h1 class="heading color-se">Thông tin chuyển khoản</h1>
    <table class="table table-borderless mt-30">
        <tbody>
            <tr>
                <td>Ngân hàng</td>
                <td>MB Banks</td>
            </tr>
            <tr>
                <td>Số tài khoản</td>
                <td>1015643754</td>
            </tr>
            <tr>
                <td>Chủ tài khoản</td>
                <td>Công ty TNHH MEVIVU</td>
            </tr>
            <tr>
                <td>Nội dung CK</td>
                <td>Mua Iphone</td>
            </tr>
            <tr>
                <td>Hạn thanh toán</td>
                <td>58:09</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Tổng tiền</th>
                <th scope="col" class="color-se text-right">{{ number_format(500000) }} đ</th>
            </tr>
        </tfoot>
    </table>
    <div class="row mt-30">
        <div class="col">
            <div class="tutorial">
                <h3>Hướng dẫn thanh toán</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo luctus enim dignissim phasellus ut urna orci. Purus metus pretium viverra leo, mauris mi. Fermentum diam amet, et tempor, duis ut. Mi volutpat vel risus in sem ac.</span>
            </div>
        </div>
    </div>
    <div class="file-payment mt-30">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="color-pr">Tải hình ảnh chuyển khoản lên</span>
    </div>
    <div class="mt-30 mb-30">
    <button type="submit" class="btn btn-pr">Hoàn tất</button>
    </div>
</div>
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
<script src="{{ asset('public/js/payment.js') }}"></script>
@endpush