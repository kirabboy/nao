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
            <div class="item-cart d-flex bg-white justify-content-between">
                <div class="item-cart-img d-flex">
                    <input type="checkbox" name="" id="" checked>
                    <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png" alt="">
                </div>
                <div class="item-cart-info">
                    <h4 class="mb-16">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                    <div class="cart-select d-flex justify-content-between">
                        <div class="cart-quantity-control-group d-flex mb-16">
                            <div class="down-btn btn-primary-4 btn-rounded">-</div>
                            <input type="text" class="quantity-input text-center" value="11" name="quantity" im-insert="true" style="text-align: right;">
                            <div class="up-btn btn-primary-4 btn-rounded">+</div>
                          </div>
                        <div class="product-stock text-right">
                            <h4 class="color-brand-green">Còn 120 sp</h4>
                        </div>
                    </div>
                    <div class="cart-price d-flex justify-content-between">
                        <p>Giá tiền:</p>
                        <h4 class="color-brand-green">120.000</h4>
                    </div>
                </div>
            </div>
            <div class="item-cart d-flex bg-white justify-content-between">
                <div class="item-cart-img d-flex">
                    <input type="checkbox" name="" id="" checked>
                    <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png" alt="">
                </div>
                <div class="item-cart-info">
                    <h4 class="mb-16">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                    <div class="cart-select d-flex justify-content-between">
                        <div class="cart-quantity-control-group d-flex mb-16">
                            <div class="down-btn btn-primary-4 btn-rounded">-</div>
                            <input type="text" class="quantity-input text-center" value="11" name="quantity" im-insert="true" style="text-align: right;">
                            <div class="up-btn btn-primary-4 btn-rounded">+</div>
                          </div>
                        <div class="product-stock text-right">
                            <h4 class="color-brand-green">Còn 120 sp</h4>
                        </div>
                    </div>
                    <div class="cart-price d-flex justify-content-between">
                        <p>Giá tiền:</p>
                        <h4 class="color-brand-green">120.000</h4>
                    </div>
                </div>
            </div>
            <div class="item-cart d-flex bg-white justify-content-between">
                <div class="item-cart-img d-flex">
                    <input type="checkbox" name="" id="">
                    <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png" alt="">
                </div>
                <div class="item-cart-info">
                    <h4 class="mb-16">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                    <div class="cart-select d-flex justify-content-between">
                        <div class="cart-quantity-control-group d-flex mb-16">
                            <div class="down-btn btn-primary-4 btn-rounded">-</div>
                            <input type="text" class="quantity-input text-center" value="11" name="quantity" im-insert="true" style="text-align: right;">
                            <div class="up-btn btn-primary-4 btn-rounded">+</div>
                          </div>
                        <div class="product-stock text-right">
                            <h4 class="color-brand-green">Còn 120 sp</h4>
                        </div>
                    </div>
                    <div class="cart-price d-flex justify-content-between">
                        <p>Giá tiền:</p>
                        <h4 class="color-brand-green">120.000</h4>
                    </div>
                </div>
            </div>

            {{-- TỔNG TIỀN HÀNG --}}
            <div class="cart-footer bg-white fixed-bottom w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-4">
                        <div class="cart-select-all f-14">
                            <input type="checkbox" name="" id="">
                            <label class="mb-0 font-weight-bold">Tất cả</label>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="col-inner d-flex justify-content-between align-items-center">
                            <div class="cart-total f-12">
                                <p class="mb-0">Tổng cộng: <span class="subtotal">1.230.000đ</span></p>
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
