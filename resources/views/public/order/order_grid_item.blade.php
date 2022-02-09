<div class="order-item">
    <div class="order-item-inner ">
        <a href="{{ route('don-hang.show', $order->order_code) }}" class="w-100">
            <div class="order-item-content d-flex justify-content-between align-items-center">
                <div class="order-item-info">
                    <p>Mã đơn hàng</p>
                    <p>Ngày tạo đơn</p>
                    <p>Tên khác hàng</p>
                    <p>Số điện thoại</p>
                    <p>Tổng tiền</p>
                    <p>Điểm NAO</p>
                    <p>Trạng thái</p>
                </div>
                <div class="order-item-value text-right">
                    <h4>{{ $order->order_code }}</h4>
                    <h4>{{ date('d/m/Y - H:i', strtotime($order->created_at)) }}</h4>
                    <h4>{{ $order->order_info()->value('fullname') }}</h4>
                    <h4>{{ $order->order_info()->value('phone') }}</h4>
                    <h4>{{ formatPrice($order->total) }}</h4>
                    <h4>{{ $order->nao_point }}</h4>
                    {!! getStatusOrder($order) !!}
                </div>
            </div>
        </a>
    </div>
    @if ($order->status == 0)
        <div class="order-button text-right">
            <button class="btn btn-primary btn-rounded">Hủy</button>
        </div>
    @endif
</div>
