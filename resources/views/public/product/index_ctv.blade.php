@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <section class="section-product">
        <div class="list-product-items">
            @foreach ($products as $item)
            <div class="product-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <a href="{{route('product.show', $item->slug)}}"><img src="{{$item->feature_img}}"
                            alt="{{$item->name}}"></a>
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title text-uppercase">
                            <a href="{{route('product.show', $item->slug)}}">{{$item->name}}</a>
                        </h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Giá</p>
                                <p>Chiết khấu CTV</p>
                                <p>Tình trạng</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>{{formatPrice($item->productPrice->regular_price)}}</h3>
                                <h3>{{formatPrice($item->productPrice->price_ctv)}}</h3>
                                <h3>Còn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-product-button text-right">
                    <a href="{{ $item->link_driver != '' || $item->link_driver != null ? $item->link_driver : 'javascript:void(0);' }}" {{ $item->link_driver != '' || $item->link_driver != null ? 'targer="_blank"' : '' }} class="btn btn-primary btn-rounded"><i class="fas fa-arrow-down"></i>Tải tài liệu</a>
                    <form class="d-inline-block" action="{{ route('buynow') }}" method="post" enctype="multipart">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary btn-rounded">Mua ngay</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

    </section>

@endsection
