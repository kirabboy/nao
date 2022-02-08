<div class="card has-shipping-bill content-checkout mt-5 mb-5">
    <div class="card-body">	
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3>Đơn vận chuyển</h3>
            </div>
        </div>
        @foreach ( $shipping_bill as $item)  
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    
                    <p><b>Mã đơn hàng:</b> {{$item->item_code}}</p>
                    <p><b>Tên gói hàng:</b> {{$item->shipping_name}}</p>
                    <p><b>Tiền COD:</b> {{formatPrice($item->origin_cod_amount)}} vnđ</p>
                    <p><b>Phí giao hàng:</b> {{formatPrice($item->shipping_fee_total)}} vnđ</p>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    <p class="status_shipping"><b>Trạng thái:</b> {!! shippingStatus($item->status()->first()->status_step) !!} </p>
                    <p><b>Ghi chú:</b> {{$item->note}} </p>
                </div>
            </div>
            @if($item->status == 20)
            <div class="modal-footer">
                <button type="button" id="btn-destroy-shipping-order" class="btn btn-danger" data-shipping_id="{{$item->shipping_id}}">Hủy</button>
            </div>
            @endif
        @endforeach
    </div>
</div>