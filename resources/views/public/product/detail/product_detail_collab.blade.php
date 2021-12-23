@extends('public.layout.master')
@section('title', 'Chi tiết sản phẩm')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/product_detail.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endpush
@section('content')
    <header id="header-page">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="#">
                    <i class="fas fa-arrow-left"></i>
                    Chi tiết sản phẩm
                </a>
            </nav>
        </div>
    </header>
    <div id="main">
        <div class="product-gallery">
            <div class="fotorama" data-nav="thumbs">
                <img src="{{ asset('public/images/image-product-1.png') }}">
                <img src="{{ asset('public/images/image-product-2.png') }}">
                <img src="{{ asset('public/images/image-product-3.png') }}">
                <img src="{{ asset('public/images/image-product-4.png') }}">
                <img src="{{ asset('public/images/image-product-5.png') }}">
                <img src="{{ asset('public/images/image-product-6.png') }}">
                <img src="{{ asset('public/images/image-product-1.png') }}">
                <img src="{{ asset('public/images/image-product-2.png') }}">
                <img src="{{ asset('public/images/image-product-3.png') }}">
                <img src="{{ asset('public/images/image-product-4.png') }}">
                <img src="{{ asset('public/images/image-product-5.png') }}">
                <img src="{{ asset('public/images/image-product-6.png') }}">
            </div>
        </div>
        <div class="container">
            <div class="product-detail">
                <h3 class="product-title">ÁO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC UZZLANG TRẺ TRUNG ...</h3>
                <h4 class="product-price">
                    200.000 đ
                </h4>
                <ul class="product-list-info">
                    <li><span class="info-name">Khối lượng</span><span class="info-value">0.2 G</span></li>
                    <li><span class="info-name">Chiết khấu CTV</span><span class="info-value">168.0000</span></li>
                    <li><span class="info-name">Trạng thái</span><span class="info-value">Còn
                            hàng</span></li>
                    <li><span class="info-name">Khuyến mại</span><span class="info-value">Không</span></li>
                </ul>
            </div>
        </div>
        <div class="product-action">
            <a class="btn btn-pri" href="">Thêm vào giỏ hàng</a>
            <a class="btn btn-pri" href="">Mua ngay</a>
        </div>
    </div>
@endsection
