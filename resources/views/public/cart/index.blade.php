@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
    <style>
        .menu-fix{
            display: none !important;
        }
    </style>
@endpush

@section('content')

    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                <!-- {{ url()->previous() }} -->
                    <a href="{{ url('san-pham') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Sản phẩm
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-cart">
        <div class="list-carts">
            <div class="list-items">
                @foreach ($cart->content() as $row)
                    @include('public.cart.include.cart_item', ['item'=>$row])
                @endforeach
            </div>
            {{-- TỔNG TIỀN HÀNG --}}
            
            <div class="cart-footer bg-white fixed-bottom w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-4">
                        <div class="cart-select-all f-14">
                            <input type="checkbox" name="" id="check-out-all" data-url="{{route('cart.update.checkout')}}">
                            <label class="mb-0 font-weight-bold">Tất cả</label>
                        </div>
                    </div>
                    <div class="col-8 pl-0">
                        <div class="col-inner d-flex justify-content-between align-items-center">
                            <div class="cart-total f-12">
                                <p class="mb-0 text-center">Tổng cộng<br> <span
                                        class="subtotal" id="subtotal">0 đ</span></p>
                            </div>
                            {{-- <button class="btn btn-primary btn-rounded">Mua hàng</button> --}}
                            <form action="{{route('cart.checkout')}}" method="post">
                                @csrf
                                <input type="hidden" name="rowids" value="">
                                <button id="btn-checkout" class="btn btn-primary btn-rounded" type="submit" disabled>Thanh toán</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script src="{{ asset('public/js/cart.js') }}"></script>
@endpush
