@extends('public.layout.master')
@section('title', 'Thông tin vận chuyển')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/tracking_order.css') }}">
@endpush
@section('content')
    <header id="header-page">
        <div class="container cart-content">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="{{ url('chi-tiet-don-hang') }}">
                    <i class="fas fa-chevron-left"></i>
                    Thông tin vận chuyển
                </a>
            </nav>
        </div>
    </header>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="shipping-box-detail">
                        <p class="order-box-title"><b>Đơn vị vận chuyển</b></p>
                        <p><img class="order-icon" src="{{ asset('/public/images/truck.png') }}" alt=""><span>Giao hàng tiết kiệm</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="shipping-box-detail">
                        <ul class="road-map-status-shipping">
                            <li>
                                <img src="{{ asset('/public/images/status-shipping.png') }}" alt="">
                                <span>Đang giao hàng</span>
                            </li>
                            <li>
                                <img src="{{ asset('/public/images/status-shipping.png') }}" alt="">
                                <span>Đơn hàng đã đến kho HCM</span>
                            </li>
                            <li>
                                <img src="{{ asset('/public/images/status-shipping.png') }}" alt="">
                                <span>Đã giao hàng cho đơn vị vận chuyển</span>
                            </li>
                            <li>
                                <img src="{{ asset('/public/images/status-shipping.png') }}" alt="">
                                <span>Đã xác nhận đơn hàng</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
