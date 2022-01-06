@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/filter.css') }}">
@endpush

@section('content')
    <section class="filter mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-6">
                    <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
                </div>
            </div>    
        </div>
    </section>

    <section class="section-order">
        <div class="order-list">
            {{-- CHỜ XÁC NHẬN (CÓ BUTTON HỦY) --}}
            <div class="order-item">
                <div class="order-item-inner d-flex">
                    <div class="order-item-img">
                        <a href="{{url('/don-hang/chi-tiet')}}">
                            <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                        alt="">
                        </a>
                    </div>
                    <div class="order-item-content d-flex justify-content-between align-items-center">
                        <div class="order-item-info">
                            <p>Mã đơn hàng</p>
                            <p>Ngày tạo đơn</p>
                            <p>Tên khác hàng</p>
                            <p>Số điện thoại</p>
                            <p>Tổng tiền</p>
                            <p>Điểm NAO</p>
                            <p>Trạng thái</p>
                        </div>
                        <div class="order-item-value text-right">
                            <h4>NAO9786</h4>
                            <h4>06/12/2021</h4>
                            <h4>Cao học viên</h4>
                            <h4>0902456789</h4>
                            <h4>1.000.000đ</h4>
                            <h4>50</h4>
                            <h4 class="order-item-status is-pending">Chờ xác nhận</h4>
                        </div>
                    </div>
                </div>
                <div class="order-button text-right">
                    <button class="btn btn-primary btn-rounded">Hủy</button>
                </div>
            </div>
            {{-- CHỜ LẤY HÀNG --}}
            <div class="order-item">
                <div class="order-item-inner d-flex">
                    <div class="order-item-img">
                        <a href="{{url('/don-hang/chi-tiet')}}">
                            <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                        alt="">
                        </a>
                    </div>
                    <div class="order-item-content d-flex justify-content-between align-items-center">
                        <div class="order-item-info">
                            <p>Mã đơn hàng</p>
                            <p>Ngày tạo đơn</p>
                            <p>Tên khác hàng</p>
                            <p>Số điện thoại</p>
                            <p>Tổng tiền</p>
                            <p>Điểm NAO</p>
                            <p>Trạng thái</p>
                        </div>
                        <div class="order-item-value text-right">
                            <h4>NAO9786</h4>
                            <h4>06/12/2021</h4>
                            <h4>Cao học viên</h4>
                            <h4>0902456789</h4>
                            <h4>1.000.000đ</h4>
                            <h4>50</h4>
                            <h4 class="order-item-status is-pending">Chờ lấy hàng</h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ĐANG GIAO HÀNG --}}
            <div class="order-item">
                <div class="order-item-inner d-flex">
                    <div class="order-item-img">
                        <a href="{{url('/don-hang/chi-tiet')}}">
                            <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                        alt="">
                        </a>
                    </div>
                    <div class="order-item-content d-flex justify-content-between align-items-center">
                        <div class="order-item-info">
                            <p>Mã đơn hàng</p>
                            <p>Ngày tạo đơn</p>
                            <p>Tên khác hàng</p>
                            <p>Số điện thoại</p>
                            <p>Tổng tiền</p>
                            <p>Điểm NAO</p>
                            <p>Trạng thái</p>
                        </div>
                        <div class="order-item-value text-right">
                            <h4>NAO9786</h4>
                            <h4>06/12/2021</h4>
                            <h4>Cao học viên</h4>
                            <h4>0902456789</h4>
                            <h4>1.000.000đ</h4>
                            <h4>50</h4>
                            <h4 class="order-item-status is-going">Đang giao hàng</h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Đã giao --}}
            <div class="order-item">
                <div class="order-item-inner d-flex">
                    <div class="order-item-img">
                        <a href="{{url('/don-hang/chi-tiet')}}">
                            <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                        alt="">
                        </a>
                    </div>
                    <div class="order-item-content d-flex justify-content-between align-items-center">
                        <div class="order-item-info">
                            <p>Mã đơn hàng</p>
                            <p>Ngày tạo đơn</p>
                            <p>Tên khác hàng</p>
                            <p>Số điện thoại</p>
                            <p>Tổng tiền</p>
                            <p>Điểm NAO</p>
                            <p>Trạng thái</p>
                        </div>
                        <div class="order-item-value text-right">
                            <h4>NAO9786</h4>
                            <h4>06/12/2021</h4>
                            <h4>Cao học viên</h4>
                            <h4>0902456789</h4>
                            <h4>1.000.000đ</h4>
                            <h4>50</h4>
                            <h4 class="order-item-status is-going">Đã giao hàng</h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ĐÃ HỦY --}}
            <div class="order-item">
                <div class="order-item-inner d-flex">
                    <div class="order-item-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                        alt="">
                    </div>
                    <div class="order-item-content d-flex justify-content-between align-items-center">
                        <div class="order-item-info">
                            <p>Mã đơn hàng</p>
                            <p>Ngày tạo đơn</p>
                            <p>Tên khác hàng</p>
                            <p>Số điện thoại</p>
                            <p>Tổng tiền</p>
                            <p>Điểm NAO</p>
                            <p>Trạng thái</p>
                        </div>
                        <div class="order-item-value text-right">
                            <h4>NAO9786</h4>
                            <h4>06/12/2021</h4>
                            <h4>Cao học viên</h4>
                            <h4>0902456789</h4>
                            <h4>1.000.000đ</h4>
                            <h4>50</h4>
                            <h4 class="order-item-status is-pending">Đã hủy</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
