@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
@endpush

@section('content')

    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/gio-hang') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Đặt đơn
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <section class="section-checkout">
        <div class="checkout-add-info text-center">
            <a href="{{url('/checkout/nhap-thong-tin')}}" class="add-info btn btn-secondary btn-rounded">
                <span class="add-info-plus-icon d-inline-block mb-0">+</span>
                <span>Thêm thông tin khách hàng</span>
            </a>
            {{-- <button class="add-info btn btn-secondary btn-rounded">
                <span class="add-info-plus-icon d-inline-block mb-0">+</span>
                <span>Thêm thông tin khách hàng</span>
            </button> --}}
        </div>

        <div class="checkout-customer-info bg-white">
            <div class="customer-info-content">
                <div class="d-flex justify-content-between">
                    <p>Cao học viên</p>
                    <div class="customer-edit-icon text-center">
                        <button class="btn p-0 bg-white mr-2"><i class="far fa-edit color-brand-green"></i></button>
                        <button class="btn p-0 bg-white"><i class="fas fa-trash-alt color-brand-green"></i></i></button>
                    </div>
                </div>
                <p>Số điện thoại : 0398476543</p>
                <p>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</p>
            </div>
        </div>

        <div class="list-checkout">
            <div class="checkout-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Số lượng:</p>
                                <p>Giá tiền:</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>3</h3>
                                <h3>123.999</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-item bg-white">
                <div class="item-product-info d-flex">
                    <div class="item-product-img">
                        <img src="https://giagoc24h.vn/wp-content/uploads/2020/08/t%C3%BAi-x%C3%A1ch-phong-c%C3%A1ch-h%C3%A0n-qu%E1%BB%91c.png"
                            alt="">
                    </div>
                    <div class="item-product-content">
                        <h4 class="item-product-title">BALO NỮ THỜI TRANG PHONG CÁCH HÀN QUỐC</h4>
                        <div class="item-product-info-detail d-flex justify-content-between">
                            <div class="item-info-title text-left">
                                <p>Số lượng:</p>
                                <p>Giá tiền:</p>
                            </div>
                            <div class="item-info-value text-right">
                                <h3>3</h3>
                                <h3>123.999</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-coupon bg-white">
            <h3 class="mb-0">Mã giảm giá</h3>
            <div class="form-row align-items-center">
                <div class="col-9">
                    <input type="text" class="form-control btn-rounded" placeholder="Nhập mã giảm giá">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary btn-rounded btn-block">Áp dụng</button>
                </div>
            </div>
        </div>

        <div class="checkout-shipping bg-white">
            <h4>Chọn đơn vị vận chuyển</h4>
            <input type="checkbox"/>
            <label for="myCheckbox1">
                <img src="https://saigongiftbox.com/wp-content/uploads/2021/03/dia-chi-buu-dien-danh-sach-buu-cuc.jpg" alt="">
            </label>
        </div>

        <div class="checkout-shipping-fee bg-white d-flex align-items-center justify-content-between">
            <h3>Phí vận chuyển</h3>
            <h3 class="color-brand-green">30.000đ</h3>
        </div>

        <div class="checkout-package bg-white">
            <h3 class="mb-0">Đóng gói</h3>
            <select name="" id="" class="form-control">
                <option value="">Đồng giá 7.500đ</option>
            </select>
        </div>

        <div class="checkout-payment bg-white d-flex align-items-center justify-content-between">
            <p>Phương thức thanh toán</p>
            <h3 class="color-brand-green">Chuyển khoản</h3>
        </div>

        <div class="checkout-info bg-white d-flex justify-content-between align-items-center">
            <div class="checkout-info-title">
                <p>Tổng giá sản phẩm</p>
                <p>Phí vận chuyển</p>
                <p>Phí đóng gói</p>
                <p>Giảm giá</p>
                <p>Điểm NAO</p>
            </div>
            <div class="checkout-info-value text-right">
                <h4>1.200.000đ</h4>
                <h4>30.000đ</h4>
                <h4>7.500đ</h4>
                <h4>-30.000đ</h4>
                <h4>600</h4>
            </div>
        </div>

        <div class="checkout-footer bg-white d-flex justify-content-between align-items-center">
            <p class="mb-0">Tổng cộng: <span class="subtotal">1.230.000đ</span></p>
            {{-- <button class="btn btn-primary btn-rounded">Đặt hàng</button> --}}
            <a href="{{url('/thanh-toan')}}" class="btn btn-primary btn-rounded">Đặt hàng</a>
        </div>

    </section>

@endsection
