@extends('public.layout.master')
@section('title', 'Thêm địa chỉ khác hàng')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/customer.css') }}">
@endpush
@section('content')
<header id="header-page">
    <div class="container cart-content">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <a class="nav-page-text" href="{{url('chi-tiet-khach-hang#nav-addess')}}">
                <i class="fas fa-chevron-left"></i>
               Thêm địa chỉ khác hàng
            </a>
        </nav>
    </div>
</header>

<div id="main">
    <div class="container">
        <form action="" class="form-add-address-customer">
            <div class="form-group">
                <label for="province">Tỉnh thành</label>
                <select type="text" class="form-control" id="province">
                    <option value="1">--chọn tỉnh thành--</option>
                    <option value="2">Hồ Chí Minh</option>
                </select>
            </div>
            <div class="form-group">
                <label for="district">Quận / Huyện</label>
                <select type="text" class="form-control" id="district">
                    <option value="1">--chọn quận / huyện--</option>
                    <option value="2">Gò Vấp</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ward">Phường / Xã</label>
                <select type="text" class="form-control" id="ward">
                    <option value="1">--chọn phường / xã--</option>
                    <option value="2">Phường 8</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address-detail">Địa chỉ</label>
                <input type="text" class="form-control" id="address-detail" placeholder="Địa chỉ..."
                    value="28 đường số 2, Phường 7, Vò Gấp">
            </div>
            <div class="form-check form-group">
                <input type="checkbox" class="form-check-input" id="check-default">
                <label class="form-check-label" for="check-default">Đặt làm địa chỉ mặc định</label>
              </div>
            <div class="form-group text-center">
                <button type="submit" class="btn-submit background-primary">Lưu</button>
            </div>
        </form>
    </div>
</div>
@endsection
