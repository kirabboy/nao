

    <!-- <header>
        <div class="container">
            <div class="backheader d-flex align-items-center">
                <h3>
                    <a href="{{ url('/checkout') }}" style="color: var(--text-color);">
                        <i class="fas fa-angle-left"></i> Đặt đơn
                    </a>
                </h3>
            </div>
        </div>
    </header> -->

    <section class="customer-fill-info">
        <!-- <div class="select-type-customer">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="isOldCustomer" checked>
                    Khách hàng cũ
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="isOldCustomer">
                    Khách hàng mới
                </label>
            </div>
        </div> -->

        <!-- <div class="search-old-customer">
            <h3>Tìm kiếm khách hàng</h3>
            <div class="row justify-content-between align-items-center">
                <div class="col-7">
                    <input type="text" name="" class="form-control btn-rounded" placeholder="Nhập tên tìm kiếm ...">
                </div>
                <div class="col-5 text-right">
                    <button class="btn btn-primary btn-rounded btn-block">Lấy thông tin</button>
                </div>
            </div>
        </div> -->

        <form action="{{ route('update.address.shipping', $address_shipping->id ) }}" class="form-customer-info" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label><h3>Tên khách hàng</h3></label>
                <input type="text" class="form-control btn-rounded" name="fullname" value="{{ $address_shipping->customer->name }}">
            </div>
            <div class="form-group">
                <label><h3>Số điện thoại</h3></label>
                <input type="text" class="form-control btn-rounded" name="phone" value="{{ $address_shipping->customer->phone }}">
            </div>
            <div class="form-group">
                <label><h3>Địa chỉ</h3></label>
                <input type="text" class="form-control btn-rounded" name="address" value="{{ $address_shipping->address }}">
            </div>
            <div class="form-group">
                <label><h3>Tỉnh / Thành</h3></label>
                <select name="province_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn tỉnh / thành---</option>
                    @foreach($province as $value)
                    <option {{ selected($address_shipping->id_province, $value->matinhthanh) }} value="{{ $value->matinhthanh }}">{{ $value->tentinhthanh }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><h3>Quận / Huyện</h3></label>
                <select name="district_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn quận / huyện---</option>
                    @foreach ($district as $value)
                    <option {{ selected($address_shipping->id_district, $value->maquanhuyen) }} value="{{ $value->maquanhuyen }}">{{ $value->tenquanhuyen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><h3>Phường / Xã</h3></label>
                <select name="ward_id" class="form-control btn-rounded" required>
                    <option value="">---Chọn phường / xã---</option>
                    @foreach ($ward as $value)
                    <option {{ selected($address_shipping->id_ward, $value->maphuongxa) }} value="{{ $value->maphuongxa }}">{{ $value->tenphuongxa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><h3>Kho</h3></label>
                <select name="warehouse_id" class="form-control btn-rounded" required>
                    @foreach($warehouse as $value)
                        <option {{ selected($address_shipping->id_warehouse, $value->id) }} value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="id" value="{{ $address_shipping->id }}">
            <button type="submit" class="btn btn-primary btn-rounded d-block mx-auto">Xác nhận</button>

        </form>
    </section>