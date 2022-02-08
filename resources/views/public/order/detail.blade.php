@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')
    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ route('don-hang.index') }}" style="color: var(--text-color);">
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
                <a href="{{ url('/don-hang/thong-tin-van-chuyen') }}">Xem chi tiết</a>
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
                    <p>{{ $order->order_info()->value('fullname') }}</p>
                    <p>Số điện thoại : {{ $order->order_info()->value('phone') }}</p>
                    <p>{{ $order->order_address()->value('address') }},
                        {{ $order->order_address()->first()->ward()->value('tenphuongxa') }},
                        {{ $order->order_address()->first()->district()->value('tenquanhuyen') }},
                        {{ $order->order_address()->first()->province()->value('tentinhthanh') }}</p>
                </div>
            </div>
        </div>

        <div class="order-info-items">
            @foreach($order->order_products()->get() as $order_product)
            <div class="order-info-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="{{asset($order_product->feature_img)}}"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">{{$order_product->name}}</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Số lượng:</p>
                                <p>Giá tiền:</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>{{$order_product->quantity}}</h3>
                                <h3>{{formatPrice($order_product->quantity * $order_product->price)}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                <h4>{{ formatPrice($order->sub_total)}}</h4>
                <h4>{{formatPrice($order->shipping_total)}}</h4>
                <h4>{{formatPrice($order->fee_process)}}</h4>
                <h4>{{formatPrice($order->total)}}</h4>
            </div>
        </div>
    </section>

@endsection
