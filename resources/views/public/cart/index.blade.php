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
                        <i class="fas fa-angle-left"></i> Giỏ hàng
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-cart">
        <div class="list-carts">
            @foreach ($cart->content() as $row)
                @include('public.cart.include.cart_item', ['item'=>$row])
            @endforeach
            {{-- TỔNG TIỀN HÀNG --}}
            <div class="cart-footer bg-white fixed-bottom w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-4">
                        <div class="cart-select-all f-14">
                            <input type="checkbox" name="" id="check-out-all">
                            <label class="mb-0 font-weight-bold">Tất cả</label>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="col-inner d-flex justify-content-between align-items-center">
                            <div class="cart-total f-12">
                                <p class="mb-0">Tổng cộng: <span class="subtotal">{{$cart->subtotal('0', '', '.')}} đ</span></p>
                            </div>
                            {{-- <button class="btn btn-primary btn-rounded">Mua hàng</button> --}}
                            <a href="{{url('/checkout')}}" class="btn btn-primary btn-rounded">Mua ngay</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script src="{{asset('public/js/cart.js')}}"></script>
@endpush