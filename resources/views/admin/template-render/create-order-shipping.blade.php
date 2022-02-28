<link rel="stylesheet" href="{{asset('/resources/css/shipping.css')}}">

<div class="modal fade show" id="order-shipping-view" tabindex="-1" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-anchor"></i> Tạo đơn vận chuyển </h4>
                <button type="button" class="btn-close" onclick="destroyModal(this)"></button>
            </div>
            <div class="modal-body content-checkout">
               <form id="form-order-shipping-create" class="form" method="post" data-action="{{route('post.shipping.create')}}">
                    @csrf
                    <input type="hidden" name="in_id_order" value="{{$order->id}}">
                    <h4>Thông tin người đặt</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                            
                            <p><b>Họ và tên:</b> {{$order_info->fullname}}</p>
                            <p><b>Số điện thoại:</b> {{$order_info->phone}}</p>
                            <p><b>Email:</b> {{$order_info->email}}</p>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                            <p><b>Địa chỉ:</b> {{$address}} </p>
                            <p><b>Ghi chú:</b> {{$order_info->note}} </p>
                        </div>
                    </div>
                    <hr>  
                    <h4>Thông tin sản phẩm</h4>   
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group w-100">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $order_products as $item)      
                                        <tr class="cart_item">
                                            <td class="product-name" data-title="Sản phẩm">
                                                <a href="{{url('san-pham/'.$item->slug)}}">{{$item->name}}</a>
                                                <strong class="product-quantity">× {{$item->pivot->quantity}}</strong>
                                            </td>

                                            <td class="product-total" data-title="Tổng cộng">
                                                <span class="amount">{{formatPrice($item->pivot->price *$item->pivot->quantity)}} đ</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td><span class="amount">{{formatPrice($order->sub_total)}}</span></td>
                                        </tr>
                                        <tr class="checkout-shipping-label-curent">
                                            <th>Phí giao hàng</th>
                                            <td>{{formatPrice($order->shipping_total)}}</td>
                                        </tr>
                                        <tr class="checkout-shipping-label-curent">
                                            <th>Phương thức giao hàng</th>
                                            <td>{{shippingMethod($order->shipping_method)}}</td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span class="amount" data-total={{$order->total}}>{{formatPrice($order->shipping_total+$order->total)}}₫</span></strong> </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" onclick="destroyModal()">Đóng</button>
                        <button type="submit" class="btn btn-info btn-submit-unit">Tạo đơn</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
