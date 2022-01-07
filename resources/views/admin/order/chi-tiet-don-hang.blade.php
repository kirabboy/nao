@extends('admin.layouts.master')
@section('content')
<!-- <link rel="stylesheet" href="{{asset('/resources/css/khuyenmai.css')}}"> -->
<link rel="stylesheet" href="{{asset('/public/admin/css/shipping.css')}}">
<section class="home-section">
    <div class="header bg-white shadow-sm header_mobile">
        <div class="text"><i class="fas fa-anchor"></i> Chi tiết đơn hàng</div>
        <div class="icon_menu-mobile">
            <i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false" aria-controls="menu-main"></i>
        </div>
    </div>
    <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
            <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
                </li>
            </ul>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý nhân viên</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dữ liệu Master</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
        </li>
    </ul>
    <div class="m-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card content-checkout content-order">
                    <div class="card-body">	
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title change-status-{{$order->id}}">Đơn hàng #{{$order->id}} 
                                    ( {!! orderStatus($order->status) !!} )
                                </h3>
                            </div>
                            @if($order->status !=3 )
                            <div class="content-shipping-create">
                                 @if(count($shipping_bill) == 0)
                                 <button id="btn-order-shipping-create" type="button" class="btn btn-success" data-id="{{$order->id}}" data-url={{route('get.shipping.create')}} onClick="viewShippingOrder(this)">
                                    <i class="fas fa-shipping-fast"></i> Tạo đơn vận Chuyển
                                </button>&nbsp;
                                @else
                                <button class="btn btn-success">
                                        <i class="fas fa-shipping-fast"></i> Đã tạo đơn vận chuyển</button>
                                @endif
                                <span data-bs-toggle="collapse" class="btn btn-primary" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </div>
                            @endif
                        </div>
                        <div class="collapse show" id="collapseExample">
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                <form id="form-order-detail" class="form" method="post" action="{{route('order.update')}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="in_id_order" value="{{$order->id}}">
                                    <p>Thông tin người đặt</p>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                            <div class="form-group w-100">
                                                <label for="fullname">Họ và Tên <abbr class="required"
                                                        title="bắt buộc">*</abbr></label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{$order_info->fullname}}" required>
                                            </div>
                                            <div class="form-group w-100">
                                                <label for="fullname">Số điện thoại <abbr class="required"
                                                        title="bắt buộc">*</abbr></label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{$order_info->phone}}" required>
                                            </div>
                                            <div class="form-group w-100">
                                                <label for="fullname">Email <abbr class="required"
                                                        title="bắt buộc">*</abbr></label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{$order_info->email}}" required>
                                            </div>
                                            <div class="form-group w-100">
                                            <label for="fullname">Ngày đặt <abbr class="required"
                                                        title="bắt buộc">*</abbr></label>
                                                
                                                <input type="text" class="form-control" name="in_created_at" id="fdate" value="{{date('Y-m-d H:i:s', strtotime($order->created_at))}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                                            <div class="form-group w-100">
                                                <label for="">Tỉnh thành <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                    <select name="sel_province" class="form-control select2" data-placeholder="---Chọn tỉnh thành---" required>
                                                        <option value="{{$order_address->province()->value('matinhthanh')}}">{{$order_address->province()->value('tentinhthanh')}}</option>
                                                        @foreach($provinces as $value)
                                                            <option value="{{$value->matinhthanh}}">{{$value->tentinhthanh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12 col-lg-6">
                                                    <label for="">Quận huyện <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                        <select class="form-control select2" name="sel_district" data-placeholder="---Chọn quận huyên---" required>
                                                            <option value="{{$order_address->district()->value('maquanhuyen')}}">{{$order_address->district()->value('tenquanhuyen')}}</option>
                                                            @foreach($districts as $value)
                                                                <option value="{{$value->maquanhuyen}}">{{$value->tenquanhuyen}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-lg-6">
                                                    <label for="">Phường xã <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                        <select class="form-control select2" name="sel_ward" data-placeholder="---Chọn phường xã---" required>
                                                            <option value="{{$order_address->ward()->value('maphuongxa')}}">{{$order_address->ward()->value('tenphuongxa')}}</option>
                                                            @foreach($wards as $value)
                                                                <option value="{{$value->maphuongxa}}">{{$value->tenphuongxa}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group w-100">
                                                    <label for="address">Địa chỉ <abbr class="required"
                                                            title="bắt buộc">*</abbr><small class="text-danger">( Địa chỉ không bao gồm phường xã, quận huyện, tỉnh thành.)</small></label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$order_address->address}}" required>
                                                    
                                                </div>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <div class="form-group w-100">
                                                <label for="fullname">Ghi chú <abbr class="required"
                                                        title="bắt buộc">*</abbr></label>
                                                <textarea name="note" id="note" style="width:100%" rows="5">{{$order_info->note}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Thông tin sản phẩm</p>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <div class="order-detail-table-product">
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
                                                            <td><span class="amount">{{formatPrice($order->sub_total)}} đ</span></td>
                                                        </tr>
                                                        <tr class="checkout-shipping-label-curent">
                                                            <th>Phí ship hiện tại</th>
                                                            <td>{{formatPrice($order->shipping_total)}} đ</td>
                                                        </tr>
                                                        <tr class="checkout-shipping-label-curent">
                                                            <th>Phương thức hiện tại</th>
                                                            <td>{{shippingMethod($order->shipping_method)}}</td>
                                                        </tr>
                                                        <tr class="checkout-shipping-label">
                                                            <th>Phí ship mới</th>
                                                            <td>Chọn lại địa chỉ</td>
                                                        </tr>
                                                        <tr>
                                                            <input type="hidden" name="shipping_method" value="{{$order->shipping_method}}">
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Tổng cộng</th>
                                                            <td><strong><span class="amount" data-total={{number_format($order->total)}}>{{number_format($order->total + $order->shipping_total)}} ₫</span></strong> </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @if($order->status == 0)
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-dark" onclick="orderDestroy({{$order->id}})">Hủy</button>
                                        <button type="submit" class="btn btn-info btn-submit-unit">Cập nhật</button>
                                    </div>
                                    @endif
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($shipping_bill) > 0)
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
                @endif
            </div>
            
        </div>
    </div>
  <!-- The Modal -->
  <div class="modal" id="modal-shipping-destroy">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hủy đơn vận chuyển</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" id="form-shipping-order-destroy">
                @csrf
                <input type="hidden" name="shipping_id" value="">
                <div class="form-group mb-3">
                    <textarea name="text_note" class="form-control" placeholder="Ghi chú"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Hủy đơn</button>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onClick="modalClose('#modal-shipping-destroy');">Đóng</button>
          
        </div>
        
      </div>
    </div>
  </div>
</section>
<script src="{{asset('/public/admin/js/shipping/shipping.js')}}"></script>
<script src="{{asset('/public/admin/js/shipping.js')}}"></script>
<script src="{{asset('/public/admin/js/order.js')}}"></script>
@endsection


