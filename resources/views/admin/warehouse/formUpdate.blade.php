<div class="modal fade show" id="calculation_unit_update" tabindex="-1" aria-hidden="true" style="display:block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-anchor"></i> Thông tin kho hàng </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="destroyModal()" ></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formUpdateUnit" action="{{route('warehouse.update')}}" role="form" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$unit->id}}">
                    <input type="hidden" name="product_id_old" value="{{$productEdit->product_id}}">
                    <div class="form-body">
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Mã chi nhánh:<span class="required"
                                    aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <input type="text" name="warehouseCode" class="form-control" required
                                    value="{{ $unit->code }}" readonly>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Tên chi nhánh NPP:<span class="required"
                                    aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <input type="text" name="warehouseName" class="form-control" required
                                    value="{{ $unit->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Địa chỉ kho:<span class="required"
                                aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <input type="text" name="warehouseAddress" class="form-control" required
                                    value="{{ old('warehouseAddress', $unit->address) }}">
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Thành phố:<span class="required"
                                aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <select class="js-edit-location" id="select-editCity" name="id_province" data-type="city" data-placeholder="Chọn thành phố">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->matinhthanh}}"
                                            @if ($city->matinhthanh == $unit->id_province)
                                                selected
                                            @endif>
                                            {{$city->matinhthanh}} - {{$city->tentinhthanh}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Quận/ huyện:<span class="required"
                            aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <select class="js-edit-location" id="select-editDistrict" name="id_district" data-type="district" data-placeholder="Chọn quận/huyện">
                                    @foreach ($districts as $district)
                                        <option value="{{$district->maquanhuyen}}"
                                            @if ($district->maquanhuyen == $unit->id_district)
                                                selected
                                            @endif
                                        >
                                            {{$district->maquanhuyen}} - {{$district->tenquanhuyen}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Phường/ Xã:<span class="required"
                                aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <select id="select-editWard" name="id_ward" data-type="ward" data-placeholder="Chọn phường/xã">
                                    @foreach ($wards as $ward)
                                        <option value="{{$ward->maphuongxa}}"
                                            @if ($ward->maphuongxa == $unit->id_ward)
                                                selected
                                            @endif
                                        >
                                            {{$ward->maphuongxa}} - {{$ward->tenphuongxa}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Sản phẩm<span class="required"
                                    aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <select name="product" class="form-control productId" disabled>
                                        <option value="{{$productEdit->product_id}}"
                                            @if (in_array($productEdit->product_id, $unit->products->pluck('id')->toArray()))
                                                selected
                                            @endif
                                        >{{$unit->products->where('id', $productEdit->product_id)->first()->name}}
                                        </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label class="col-md-3 control-label">Số lượng:<span class="required"
                                    aria-required="true">(*)</span></label>
                            <div class="col-md-9">
                                <input type="number" name="productQuantity" class="form-control" required
                                    value="{{ old('productQuantity', $productEdit->quantity) }}" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="destroyModal()">Hủy</button>
                        <button type="submit" class="btn btn-info btn-submit-unit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>