@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
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
        <div class="info-shipping">
            @if ($address_shipping == null)
                <div class="checkout-add-info text-center">
                    <a href="#" class="show-modal add-info btn btn-secondary btn-rounded">
                        <span class="add-info-plus-icon d-inline-block mb-0">+</span>
                        <span>Thêm thông tin khách hàng</span>
                    </a>
                </div>
            @else
                @include('public.render.user_address_shipping')
            @endif
        </div>
        <div class="list-checkout">
            @foreach (explode(',', $rowids) as $rowid)
                <div class="checkout-item bg-white">
                    <div class="item-product-info d-flex">
                        <div class="item-product-img">
                            <img src="{{ $cart->get($rowid)->model->feature_img }}" alt="">
                        </div>
                        <div class="item-product-content">
                            <h4 class="item-product-title">{{ $cart->get($rowid)->name }}</h4>
                            <div class="item-product-info-detail d-flex justify-content-between">
                                <div class="item-info-title text-left">
                                    <p>Số lượng:</p>
                                    <p>Giá tiền:</p>
                                </div>
                                <div class="item-info-value text-right">
                                    <h3>{{ $cart->get($rowid)->qty }}</h3>
                                    <h3>{{ formatPrice($cart->get($rowid)->qty * $cart->get($rowid)->price) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        <form action="{{ route('checkout.postOrder') }}" method="post">

            <div class="checkout-shipping bg-white">
                <h4>Chọn đơn vị vận chuyển</h4>
                <input type="radio" id="chooseShipping" name="shipping_method" value="VNPOST" />
                <label for="chooseShipping">
                    <img src="https://saigongiftbox.com/wp-content/uploads/2021/03/dia-chi-buu-dien-danh-sach-buu-cuc.jpg"
                        alt="">
                </label>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="checkout-shipping-fee bg-white d-flex align-items-center justify-content-between">
                <h3>Phí vận chuyển</h3>
                <h3 class="color-brand-green fee-shipping">Vui lòng chọn ĐVVC</h3>
            </div>

            <div class="checkout-package bg-white">
                <h3 class="mb-0">Đóng gói</h3>
                <select name="fee_process" id="" class="form-control">
                    <option value="7500">Đồng giá 7.500đ</option>
                </select>
            </div>

            <div class="checkout-payment bg-white d-flex align-items-center justify-content-between">
                <p>Phương thức thanh toán</p>
                <h3 class="color-brand-green">Chuyển khoản</h3>
            </div>
            @csrf
            <div class="checkout-info bg-white d-flex justify-content-between align-items-center">
                <div class="checkout-info-title">
                    <p>Tổng giá sản phẩm</p>
                    <p>Phí vận chuyển</p>
                    <p>Phí đóng gói</p>
                    <p>Giảm giá</p>
                    @if ($user->level != 1)
                        <p>Điểm NAO</p>
                    @endif
                </div>
                <div class="checkout-info-value text-right">
                    <h4 data-value="{{ $subtotal }}" id="subtotal">{{ formatPrice($subtotal) }}</h4>
                    <input type="hidden" name="fee_shipping">
                    @if(isset($address_shipping))
                    <input type="hidden" name="address_id" value="{{ $address_shipping->id }}">
                    @endif
                    <h4 class="fee-shipping">Vui lòng chọn ĐVVC</h4>
                    <h4>7.500đ</h4>
                    <h4>-0đ</h4>
                    @if ($user->level != 1)
                        <input type="hidden" name="nao_point" value="{{ $nao_point }}">
                        <h4>{{ formetNumber($nao_point) }}</h4>
                    @else
                        <input type="hidden" name="nao_point" value="0">
                    @endif
                </div>
            </div>

            <div class="checkout-footer bg-white d-flex justify-content-between align-items-center">
                <p class="mb-0">Tổng cộng: <span class="total"
                        id="total">{{ formatPrice($subtotal) }}</span></p>
                <button class="btn btn-primary btn-rounded" type="submit">Đặt hàng</a>
            </div>
        </form>
    </section>
    <form id="deleteAddressShipping" action="#" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <form id="shippingFee" action="{{ route('post.shippingFee') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="0">
    </form>
    <div class="modal fade" id="modalAddress" tabindex="-1" aria-labelledby="modalAddress" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddress">Thông tin khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($address_shipping == null)
                        @include('public.checkout.add_customer_form_info')
                    @else
                        @include('public.checkout.edit_customer_form_info')
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('public/js/shipping.js') }}"></script>
@endpush
