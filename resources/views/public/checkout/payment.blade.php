@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush
@push('js')
    <script src="{{ asset('public/js/payment.js') }}"></script>
@endpush

@section('content')

    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/checkout') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Thanh toán
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-payment">
        <div class="payment-info">
            <h1 class="color-brand-green mb-24">Thông tin chuyển khoản</h1>
            <p class="mb-24">Quý khách vui lòng thanh toán theo thông tin thanh toán sau:</p>
            <div class="payment-content d-flex justify-content-between align-items-center">
                <div class="payment-content-title">
                    <p>Ngân hàng</p>
                    <p>Số tài khoản</p>
                    <p>Chủ tài khoản</p>
                    <p>Nội dung CK</p>
                    <p>Hạn thanh toán</p>
                    <h2>Tổng tiền</h2>
                </div>
                <div class="payment-content-value text-right">
                    <h3>MB Banks</h3>
                    <h3>98347329847<i class="fas fa-clone"></i></h3>
                    <h3>Công ty TNHH</h3>
                    <h3>{{ $order->order_code }} <i class="fas fa-clone"></i></h3>
                    <h3>58:09</h3>
                    <h2>{{ formatPrice($order->total) }}</h2>
                </div>
            </div>
        </div>
        <div class="payment-tutor">
            <h3 class="mb-16">Hướng dẫn chuyển khoản</h3>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Rerum sint autem consectetur facilis praesentium ipsam dolor molestias provident veniam ab excepturi minus
                unde,
                numquam aspernatur eaque omnis voluptates officiis quia.
            </p>
        </div>
        <form action="{{ route('checkout.postPayment', ['order_code' => $order->order_code]) }}" method="post"
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class="payment-bill">
                <label for="">
                    <i class="fas fa-file-upload"></i> Tải hình ảnh chuyển khoản lên (tối đa 3 ảnh)
                    <input type="file" multiple id="gallery-photo-add" name="images[]"
                        accept="image/png, image/gif, image/jpeg" required>
                </label>
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="gallery"></div>
                {{-- <div class="row img-bills">
                <div class="col col-4"><img
                        src="https://lh3.googleusercontent.com/sQ0Er6z5KIfuW6Syd3qQY1yqvAqzgaSsiOiRAkRzPawmVLd5kxL1NHLu5Pc40xKRS4MXaHjm4r9r4gQlCB-DAzNkpnETtho1q8Uj14z-"
                        alt=""></div>
                <div class="col col-4"><img
                        src="https://lh3.googleusercontent.com/sQ0Er6z5KIfuW6Syd3qQY1yqvAqzgaSsiOiRAkRzPawmVLd5kxL1NHLu5Pc40xKRS4MXaHjm4r9r4gQlCB-DAzNkpnETtho1q8Uj14z-"
                        alt=""></div>
                <div class="col col-4"><img
                        src="https://lh3.googleusercontent.com/sQ0Er6z5KIfuW6Syd3qQY1yqvAqzgaSsiOiRAkRzPawmVLd5kxL1NHLu5Pc40xKRS4MXaHjm4r9r4gQlCB-DAzNkpnETtho1q8Uj14z-"
                        alt=""></div>
            </div> --}}
            </div>
            <div class="payment-confirm">
                <button class="btn btn-primary btn-rounded d-block mx-auto confirm-payment" type="submit">Xác nhận đã
                    chuyển
                    khoản</button>

            </div>
        </form>
    </section>

@endsection
