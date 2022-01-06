@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/checkout') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Đặt đơn
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="customer-fill-info">
        <div class="select-type-customer">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="isOldCustomer" checked>
                    Khách hàng cũ
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="isOldCustomer">
                    Khách hàng mới
                </label>
            </div>
        </div>

        <div class="search-old-customer">
            <h3>Tìm kiếm khách hàng</h3>
            <div class="row justify-content-between align-items-center">
                <div class="col-7">
                    <input type="text" name="" class="form-control btn-rounded" placeholder="Nhập tên tìm kiếm ...">
                </div>
                <div class="col-5 text-right">
                    <button class="btn btn-primary btn-rounded btn-block">Lấy thông tin</button>
                </div>
            </div>
        </div>

        <form action="" class="form-customer-info">
            <div class="form-group">
                <label><h3>Tên khách hàng</h3></label>
                <input type="text" class="form-control btn-rounded">
            </div>
            <div class="form-group">
                <label><h3>Số điện thoại</h3></label>
                <input type="text" class="form-control btn-rounded">
            </div>
            <div class="form-group">
                <label><h3>Địa chỉ</h3></label>
                <input type="text" class="form-control btn-rounded">
            </div>
            <div class="form-group">
                <label><h3>Tỉnh / Thành</h3></label>
                <select name="" id="" class="form-control btn-rounded">
                    <option value="">TP Hồ Chí Minh</option>
                </select>
            </div>
            <div class="form-group">
                <label><h3>Quận / Huyện</h3></label>
                <select name="" id="" class="form-control btn-rounded">
                    <option value="">Gò Vấp</option>
                </select>
            </div>
            <div class="form-group">
                <label><h3>Phường / Xã</h3></label>
                <select name="" id="" class="form-control btn-rounded">
                    <option value="">Phường 8</option>
                </select>
            </div>
            <div class="form-group">
                <label><h3>Kho</h3></label>
                <select name="" id="" class="form-control btn-rounded">
                    <option value="">NAO + HCM</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-rounded d-block mx-auto">Xác nhận</button>

        </form>
    </section>

@endsection