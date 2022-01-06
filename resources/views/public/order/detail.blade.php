@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')
    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/don-hang') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Chi tiết đơn hàng
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-order-detail">
        <div class="order-status order-sub-info bg-white">
            <h3>Trạng thái đơn hàng</h3>
            <p><i class="fas fa-check-circle"></i><span>Đang giao hàng</span></p>
        </div>
        <div class="order-shipping order-sub-info bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <h3>Thông tin vận chuyển</h3>
                <a href="{{url('/don-hang/thong-tin-van-chuyen')}}">Xem chi tiết</a>
            </div>
            <p><i class="fas fa-shipping-fast"></i><span>Đang giao hàng</span></p>
        </div>
        <div class="order-code order-sub-info bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <h3>Mã đơn hàng</h3>
                <a href="">Sao chép</a>
            </div>
            <p><i class="fas fa-box"></i></i><span>0368456NAO</span></p>
        </div>
        <div class="order-customer-info bg-white">
            <div class="checkout-customer-info">
                <div class="customer-info-content">
                    <p>Cao học viên</p>
                    <p>Số điện thoại : 0398476543</p>
                    <p>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</p>
                </div>
            </div>
        </div>

        <div class="order-info-items">
            <div class="order-info-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Số lượng:</p>
                                <p>Giá tiền:</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>3</h3>
                                <h3>123.999</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-info-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Số lượng:</p>
                                <p>Giá tiền:</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>3</h3>
                                <h3>123.999</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-payment order-sub-info bg-white">
            <h3>Phương thức thanh toán</h3>
            <p><i class="fas fa-money-check-alt"></i><span>Chuyển khoản ngân hàng</span></p>
        </div>
        <div class="order-total d-flex align-items-center justify-content-between bg-white">
            <div class="order-total-info">
                <p>Tổng giá sản phẩm</p>
                <p>Phí vận chuyển</p>
                <p>Phí đóng gói</p>
                <p>Giảm giá</p>
            </div>
            <div class="order-total-value text-right">
                <h4>1.200.000đ</h4>
                <h4>0đ</h4>
                <h4>7.500đ</h4>
                <h4>-30.000đ</h4>
            </div>
        </div>
    </section>

@endsection
