@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/public/admin/css/shipping.css')}}">
<section class="home-section">
    <div class="header bg-white shadow-sm header_mobile">
        <div class="text"><i class="fas fa-shipping-fast"></i> Cấu hình vận chuyển</div>
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
                        
                        <div class="collapse show" id="collapseExample">
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                    <form class="form" method="post" action="{{route('put.config.shipping')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                                <h4>Tài khoản VnPost</h4>
                                                <div class="form-group w-100">
                                                    <label>Username <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                    <input type="text" class="form-control" name="in_username" value="{{$config->username}}" required>
                                                </div>
                                                <div class="form-group w-100">
                                                    <label for="fullname">Password <abbr class="required"
                                                            title="bắt buộc">*</abbr></label>
                                                    <input type="password" class="form-control" name="in_password" value="{{$config->password}}" required>
                                                </div>
                                                <h4 class="mt-3">Môi trường chạy</h4>
                                                <div class="form-check">
                                                    <input {{checked($config->production, 0)}} class="form-check-input" type="radio" id="in_production1" name="in_production" value="0">
                                                    <label class="form-check-label" for="in_production1" >
                                                        Môi trường test
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{checked($config->production, 1)}} class="form-check-input" type="radio" id="in_production2" name="in_production" value="1">
                                                    <label class="form-check-label" for="in_production2">
                                                        Môi trường live
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                                <h4 class="mt-3">Cho xem hàng khi nhận</h4>
                                                <div class="form-check">
                                                    <input {{checked($config->package_viewable, 1)}}  class="form-check-input" type="radio" id="in_package_view1" name="in_package_view" value="1">
                                                    <label class="form-check-label" for="in_package_view1" >
                                                        Có
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{checked($config->package_viewable, 0)}}  class="form-check-input" type="radio" id="in_package_view2" name="in_package_view" value="0">
                                                    <label class="form-check-label" for="in_package_view2">
                                                        Không
                                                    </label>
                                                </div>
                                                <h4 class="mt-3">Hình thức thu gom</h4>
                                                <div class="form-check">
                                                    <input {{checked($config->pickup_type, 1)}}  class="form-check-input" type="radio" id="in_pickup_type1" name="in_pickup_type" value="1">
                                                    <label class="form-check-label" for="in_pickup_type1" >
                                                        Thu gôm tận nơi
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{checked($config->pickup_type, 2)}}  class="form-check-input" type="radio" id="in_pickup_type2" name="in_pickup_type" value="2">
                                                    <label class="form-check-label" for="in_pickup_type2">
                                                        Gửi hàng tại bưu cục
                                                    </label>
                                                </div>
                                                <h4 class="mt-3">khai giá</h4>
                                                <div class="form-check">
                                                    <input {{checked($config->order_amount_evaluation, 1)}}  class="form-check-input" type="radio" id="in_order_amount_evaluation1" name="in_order_amount_evaluation" value="1">
                                                    <label class="form-check-label" for="in_order_amount_evaluation1" >
                                                        Có
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{checked($config->order_amount_evaluation, 0)}}  class="form-check-input" type="radio" id="in_order_amount_evaluation2" name="in_order_amount_evaluation" value="0">
                                                    <label class="form-check-label" for="in_order_amount_evaluation2">
                                                        Không
                                                    </label>
                                                </div>
                                            </div>
                                        </div>     
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info btn-submit-unit">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  
</section>
@endsection


