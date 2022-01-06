@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <header>
        <div class="container">
            <div class="abc d-flex align-items-center">
                <h3>
                    <a href="{{ url()->previous() }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Chi tiết sản phẩm
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-product-detail">
        <div class="product-gallery mb-24">
            <div class="fotorama" data-allowfullscreen="true" data-arrows="false" data-click="false" data-nav="thumbs" data-loop="true">
                <img src="{{$product->feature_img}}">
                @php
                    $galleries = explode(', ', $product->gallery);
                @endphp
                @if (count($galleries) > 0)
                    @foreach ($galleries as $gallery)
                    <img src="{{$gallery}}">
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-info">
            <div class="product-title mb-24">
                <h4 class="mb-16 text-uppercase">{{$product->name}}</h4>
                <p class="product-price text-danger font-weight-bold mb-0">{{number_format($product->productPrice->regular_price, 0, '', '.')}}đ</p>
            </div>
            <div class="product-info-detail">
                <h4 class="mb-16">Thông tin sản phẩm</h4>
                <div class="d-flex justify-content-between">
                    <div class="item-info-title text-left">
                        <p>Khối lượng</p>
                        <p>Chiết khấu CTV</p>
                        <p>Trạng thái</p>
                        <p>Khuyến mại</p>
                    </div>
                    <div class="item-info-value text-right">
                        <h3>{{$product->weight}} G</h3>
                        <h3>{{number_format($product->productPrice->price_ctv, 0, '', '.')}}</h3>
                        <h3>Còn hàng</h3>
                        <h3>Không</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-button text-center">
            <button class="btn btn-primary btn-rounded">Thêm vào giỏ hàng</button>
            <button class="btn btn-primary btn-rounded">Mua ngay</button>
        </div>
    </section>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"
                integrity="sha512-cWEytOR8S4v/Sd3G5P1Yb7NbYgF1YAUzlg1/XpDuouZVo3FEiMXbeWh4zewcYu/sXYQR5PgYLRbhf18X/0vpRg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"
            integrity="sha512-bjwk1c6AQQOi6kaFhKNrqoCNLHpq8PT+I42jY/il3r5Ho/Wd+QUT6Pf3WGZa/BwSdRSIjVGBsPtPPo95gt/SLg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

@endsection
