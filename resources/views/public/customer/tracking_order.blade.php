@extends('public.layout.master')
@section('title', 'Chi tiết đơn hàng')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/tracking_order.css') }}">
@endpush
@section('content')
    <header id="header-page">
        <div class="container cart-content">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="{{ url('chi-tiet-khach-hang#nav-order') }}">
                    <i class="fas fa-chevron-left"></i>
                    Chi tiết đơn hàng
                </a>
            </nav>
        </div>
    </header>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-box-detail">
                        <p class="order-box-title"><b>Trạng thái đơn hàng</b></p>
                        <p><img class="order-icon" src="{{ asset('/public/images/check-one.png') }}" alt=""><span>Đang giao hàng</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-box-detail">
                        <p class="order-box-title"><b>Thông tin vận chuyển</b><a href="{{url('/thong-tin-van-chuyen')}}">Xem chi tiết</a></p>
                        <p><img class="order-icon" src="{{ asset('/public/images/truck.png') }}" alt=""><span>Đang giao hàng</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-box-detail">
                        <p class="order-box-title"><b>Mã đơn hàng</b><a href="">Sao chép</a></p>
                        <p><img class="order-icon" src="{{ asset('/public/images/code_order.png') }}" alt=""><span>0368945NAO</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-customer-info-box">
                        <ul>
                            <li>
                                <img class="order-icon" src="{{ asset('/public/images/crown-two.png') }}" alt=""><span>Nguyễn Chính Kira</span>  
                            </li>
                            <li><span>Số điện thoại : 0398476543</span></li>
                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ Chí Minh</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-box-detail">
                        <p class="order-box-title"><b>Phương thức thanh toán</b></p>
                        <p><img class="order-money" src="{{ asset('/public/images/money.png') }}" alt=""><span>Thanh toán khi nhận hàng</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="order-box-detail-list">
                        <ul>
                            <li><span>Ngày tạo đơn</span><span> 11:45 06/12/2021</span></li>
                            <li><span>Giá sản phẩm</span><span>1.000.000 đ</span></li>
                            <li><span>Phí vận chuyển</span><span>0 đ</span></li>
                            <li><span>Phí đóng gói</span><span>7.500đ</span></li>
                            <li><span>Giảm giá</span><span>-30.000đ</span></li>
                            <li><span>Tổng thanh toán</span><span>957.500 đ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="order-box-product-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                <img class="w-100" src="{{ asset('/public/images/Rectangle 956.png') }}" alt="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                <p class="order-product-title"><b>BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</b></p>
                                <ul>
                                    <li><span>Số lượng :</span><span>3</span></li>
                                    <li><span>Giá tiền :</span><span>123.999</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="order-box-product-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                <img class="w-100" src="{{ asset('/public/images/Rectangle 956.png') }}" alt="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                <p class="order-product-title"><b>BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</b></p>
                                <ul>
                                    <li><span>Số lượng :</span><span>3</span></li>
                                    <li><span>Giá tiền :</span><span>123.999</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="order-box-product-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                <img class="w-100" src="{{ asset('/public/images/Rectangle 956.png') }}" alt="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                <p class="order-product-title"><b>BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</b></p>
                                <ul>
                                    <li><span>Số lượng :</span><span>3</span></li>
                                    <li><span>Giá tiền :</span><span>123.999</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
