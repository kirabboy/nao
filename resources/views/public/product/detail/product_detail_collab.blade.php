@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">

@endpush

@section('content')

    <header>
        <div class="container">
            <div class="abc d-flex align-items-center">
                <h3>
                    <a href="{{ route('product.index') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Chi tiết sản phẩm
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-product-detail">
        <div class="product-gallery mb-24">
            <div class="fotorama" data-allowfullscreen="true" data-arrows="false" data-click="false" data-nav="thumbs"
                data-loop="true">
                <img src="{{ $product->feature_img }}">
                @php
                    $galleries = explode(', ', $product->gallery);
                @endphp
                @if (count($galleries) > 0)
                    @foreach ($galleries as $gallery)
                        <img src="{{ $gallery }}">
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-info">
            <div class="product-title mb-24">
                <h4 class="mb-16 text-uppercase">{{ $product->name }}</h4>
                <p class="product-price text-danger font-weight-bold mb-0">
                    {{ formatPrice($product->productPrice->regular_price) }}</p>
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
                        <h3>{{ $product->weight }} G</h3>
                        <h3>{{ formatPrice($product->productPrice->price_ctv) }}</h3>
                        <h3>Còn hàng</h3>
                        <h3>Không</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-button text-center">
            <form id="add-to-cart" class="d-inline-block" action="{{ route('cart.add') }}" method="post"
                enctype="multipart/form">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="btn btn-primary btn-rounded" type="submit">Thêm vào giỏ hàng</button>
            </form>
            {{-- <button class="btn btn-primary btn-rounded">Mua ngay</button> --}}
            <a href="{{ url('/gio-hang') }}" class="btn btn-primary btn-rounded">Mua ngay</a>
        </div>
    </section>
    <div class="modal fade" id="add-to-cart-success" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    Thêm vào giỏ thành công
                </div>
                <div class="modal-footer">
                    <a href="{{route('cart.index')}}" class="btn btn-primary">Xem giỏ hàng</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"
        integrity="sha512-cWEytOR8S4v/Sd3G5P1Yb7NbYgF1YAUzlg1/XpDuouZVo3FEiMXbeWh4zewcYu/sXYQR5PgYLRbhf18X/0vpRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"
        integrity="sha512-bjwk1c6AQQOi6kaFhKNrqoCNLHpq8PT+I42jY/il3r5Ho/Wd+QUT6Pf3WGZa/BwSdRSIjVGBsPtPPo95gt/SLg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('public/js/cart.js') }}"></script>

@endpush
