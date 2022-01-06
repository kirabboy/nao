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
                        <a href="{{route('product_detail_daily', $item->slug)}}"><img src="{{$item->feature_img}}"
                            alt="{{$item->name}}"></a>
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title text-uppercase">
                            <a href="{{route('product_detail_ctv', $item->slug)}}">{{$item->name}}</a>
                        </h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Giá</p>
                                <p>Điểm Nao</p>
                                <p>Chiết khấu đại lý</p>
                                <p>Tình trạng</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>{{number_format($item->productPrice->regular_price, 0, '', '.')}}</h3>
                                <h3>{{number_format($item->productPrice->nao_point, 0, '', ',')}}</h3>
                                <h3>{{number_format($item->productPrice->price_new_daily, 0, '', '.')}}</h3>
                                <h3>Còn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-button text-right">
                    <button class="btn btn-primary btn-rounded"><i class="fas fa-arrow-down"></i>Tải tài liệu</button>
                    {{-- <button class="btn btn-primary btn-rounded">Mua ngay</button> --}}
                    <a href="{{url('/gio-hang')}}" class="btn btn-primary btn-rounded">Mua ngay</a>
                </div>
            </div>
            @endforeach
        </div>

    </section>

@endsection
