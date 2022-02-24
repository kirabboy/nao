@extends('public.layout.master')
@push('css')
<style>
    .search-old-customer{
        position: relative;
    }
    .search-old-customer ul.list-group{
        position: absolute;
        z-index: 9;
        width: 100%;
        top: 73px;
        left: 0px;
        cursor: pointer;
    }
</style>
@endpush
@section('content')
    <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/thanh-toan') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Thông tin khách hàng
                    </a>
                </h3>
            </div>
        </div>
    </header>
    <section class="customer-fill-info">

        <form id="addAddressShipping" action="{{ route('add.address.shipping') }}" class="form-customer-info" method="POST">
            @csrf
            <div class="select-type-customer">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="isOldCustomer" checked value="1">
                        Khách hàng cũ
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="isOldCustomer" value="0">
                        Khách hàng mới
                    </label>
                </div>
            </div>
            <div class="search-old-customer">
                <h3>Tìm kiếm khách hàng</h3>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12">
                        <input type="text" name="searchCustomer" class="form-control btn-rounded" placeholder="Nhập tên tìm kiếm ...">
                    </div>
                    <!-- <div class="col-5 text-right">
                        <button class="btn btn-primary btn-rounded btn-block">Lấy thông tin</button>
                    </div> -->
                </div>
                <ul class="list-group"></ul>
            </div>
            <div class="form-group">
                <label><h3>Tên khách hàng</h3></label>
                <input type="text" class="form-control btn-rounded" name="fullname" required>
            </div>
            <div class="form-group">
                <label><h3>Số điện thoại</h3></label>
                <input type="text" class="form-control btn-rounded" name="phone" required>
            </div>
            <div class="form-group" >
                <label><h3>Địa chỉ</h3></label>
                <input type="text" class="form-control btn-rounded" name="address" required>
            </div>
            <div class="form-group">
                <label><h3>Tỉnh / Thành</h3></label>
                <select name="province_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn tỉnh / thành---</option>
                    @foreach($province as $value)
                    <option value="{{ $value->matinhthanh }}">{{ $value->tentinhthanh }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><h3>Quận / Huyện</h3></label>
                <select name="district_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn quận / huyện---</option>
                </select>
            </div>
            <div class="form-group">
                <label><h3>Phường / Xã</h3></label>
                <select name="ward_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn phường / xã---</option>
                </select>
            </div>
            <div class="form-group">
                <label><h3>Kho</h3></label>
                <select name="warehouse_id" class="form-control btn-rounded" required>
                    @foreach($warehouse as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="id" value="">
            <button type="submit" class="btn btn-primary btn-rounded d-block mx-auto">Xác nhận</button>

        </form>
    </section>
@endsection
@push('js')
    <script src="{{ asset('public/js/shipping.js') }}"></script>
    <script src="{{ asset('public/js/add_customer_address.js') }}"></script>
@endpush
