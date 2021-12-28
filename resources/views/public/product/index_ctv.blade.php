@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <section class="section-product">
        <div class="list-product-items">
            <div class="product-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Giá</p>
                                <p>Chiết khấu đại lý</p>
                                <p>Tình trạng</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>123.999</h3>
                                <h3>10.000</h3>
                                <h3>Còn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-product-button text-right">
                    <button class="btn btn-primary btn-rounded"><i class="fas fa-arrow-down"></i>Tải tài liệu</button>
                    <button class="btn btn-primary btn-rounded">Mua ngay</button>
                </div>
            </div>

            <div class="product-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Giá</p>
                                <p>Chiết khấu đại lý</p>
                                <p>Tình trạng</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>123.999</h3>
                                <h3>10.000</h3>
                                <h3>Còn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-button text-right">
                    <button class="btn btn-primary btn-rounded"><i class="fas fa-arrow-down"></i>Tải tài liệu</button>
                    <button class="btn btn-primary btn-rounded">Mua ngay</button>
                </div>
            </div>

            <div class="product-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Giá</p>
                                <p>Chiết khấu CTV</p>
                                <p>Tình trạng</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>123.999</h3>
                                <h3>10.000</h3>
                                <h3>Còn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-button text-right">
                    <button class="btn btn-primary btn-rounded"><i class="fas fa-arrow-down"></i>Tải tài liệu</button>
                    <button class="btn btn-primary btn-rounded">Mua ngay</button>
                </div>
            </div>
        </div>

    </section>

@endsection
