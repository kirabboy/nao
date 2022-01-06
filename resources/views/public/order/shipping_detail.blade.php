@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')
    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url()->previous() }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Thông tin vận chuyển
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-shipping-detail">
        <div class="order-shipping-unit order-sub-info bg-white">
            <h3>Đơn vị vận chuyển</h3>
            <p><i class="fas fa-shipping-fast"></i><span>VNPost</span></p>
        </div>

        <div class="order-shipping-timeline bg-white">
            <ul class="shipping-timeline">
                <li class="shipping-progress-item is-done">
                    <div>Đang giao</div>
                </li>
                <li class="shipping-progress-item is-done">
                    <div>Đơn hàng đã đến kho HCM</div>
                </li>
                <li class="shipping-progress-item current">
                    <div>Đã giao cho đơn vị vận chuyển</div>
                </li>
                <li class="shipping-progress-item">
                    <div>Đã xác nhận đơn hàng</div>
                </li>
            </ul>
        </div>

    </section>

@endsection
