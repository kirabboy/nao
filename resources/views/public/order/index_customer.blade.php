@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <div class="div-title">
        <h2 class="color-brand-green">Danh sách khách hàng</h2>
    </div>

    <section class="section-customer bg-white">
        <div class="customer-lists">
            <div class="customer-item is-vip">
                <div class="customer-item-inner d-flex justify-content-between">
                    <div class="customer-info-content">
                        <p>Cao học viên</p>
                        <p>Ngày tạo: 3/12/2021 - 12:09</p>
                        <p>Tỉnh thành: Tp Hồ Chí Minh</p>
                        <p>Số điện thoại: 0902456789</p>
                    </div>
                    <div class="customer-action d-flex flex-column justify-content-between">
                        <button class="btn btn-action btn-action-info"><i class="fas fa-info-circle"></i></button>
                        <button class="btn btn-action btn-action-time"><i class="fas fa-clock"></i></button>
                        <button class="btn btn-action btn-action-call"><i class="fas fa-phone-alt"></i></button>
                    </div>
                </div>
            </div>
            <div class="customer-item">
                <div class="customer-item-inner d-flex justify-content-between">
                    <div class="customer-info-content">
                        <p>Cao học viên</p>
                        <p>Ngày tạo: 3/12/2021 - 12:09</p>
                        <p>Tỉnh thành: Tp Hồ Chí Minh</p>
                        <p>Số điện thoại: 0902456789</p>
                    </div>
                    <div class="customer-action d-flex flex-column justify-content-between">
                        <button class="btn btn-action-info"><i class="fas fa-info-circle"></i></button>
                        <button class="btn btn-action-time"><i class="fas fa-clock"></i></button>
                        <button class="btn btn-action-call"><i class="fas fa-phone-alt"></i></button>
                    </div>
                </div>
            </div>
            <div class="customer-item">
                <div class="customer-item-inner d-flex justify-content-between">
                    <div class="customer-info-content">
                        <p>Cao học viên</p>
                        <p>Ngày tạo: 3/12/2021 - 12:09</p>
                        <p>Tỉnh thành: Tp Hồ Chí Minh</p>
                        <p>Số điện thoại: 0902456789</p>
                    </div>
                    <div class="customer-action d-flex flex-column justify-content-between">
                        <button class="btn btn-action-info"><i class="fas fa-info-circle"></i></button>
                        <button class="btn btn-action-time"><i class="fas fa-clock"></i></button>
                        <button class="btn btn-action-call"><i class="fas fa-phone-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
