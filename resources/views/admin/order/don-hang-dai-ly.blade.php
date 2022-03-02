@extends('admin.layouts.master')
@section('content')
	<script src="{{asset('/public/admin/js/admin/order.js')}}"></script>

	<link rel="stylesheet" href="{{asset('/public/admin/css/khuyenmai.css')}}">
	<link rel="stylesheet" href="{{asset('/public/admin/css/order-admin.css')}}">



<section class="home-section">
	<div class="header bg-white shadow-sm header_mobile">
		<div class="text">Dashboard</div>
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
</div>
	<div class="m-3">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<ul class="list-group list-group-flush">
								<div class="d-flex justify-content-between align-items-center">
									<p>
										<span class="caption-subject"><i class="fas fa-cart-plus"></i> DANH SÁCH ĐƠN HÀNG</span>
										<button class="btn btn_success"><i class="fas fa-plus"></i> Thêm
											mới</button>
										<button class="btn btn_success"><i class="far fa-file-excel"></i>
											Export</button>
									</p>

									<span>
										<span data-bs-toggle="collapse" href="#collapseExample" role="button"
											aria-expanded="false" aria-controls="collapseExample">
											<i class="fas fa-chevron-down"></i>
										</span>&nbsp;
										<span><i class="fas fa-sync-alt"></i></span>&nbsp;
										<span><i class="fas fa-expand"></i></span>
									</span>
								</div>
								<div class="collapse show" id="collapseExample">
									<div class="row mb-3">
										<div class="col-sm-9"></div>
										<div class="col-sm-3">
											<button type="button" class="btn btn-success"
												style="max-width: 400px; background-color: #11101D; color: #fff;">
												<str>Tổng doanh thu trong tháng</str><br>
												<span
													style="font-size: 20px; font-weight: bold; text-align: left;">{{number_format($doanh_thu)}} đ</span>
											</button>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12" style="overflow-x: auto;">
											<table id="order" class="table table-hover align-middle">
												<thead>
													<tr>
														<th class="title">ID</th>
														<!-- <th class="title"><input class="form-check" type="checkbox"></th> -->
														<th class="title">Người đặt</th>
														<th class="title">Số lượng</th>
														<th class="title">Tiền ship</th>
														<th class="title">Tiền hàng</th>
														<th class="title">Tổng tiền</th>
														<th class="title">Phụ trách</th>
														<th class="title">Ngày bán</th>
														<th class="title">Trạng thái</th>
														<th class="title" style="width:75px;">Thao tác</th>
													</tr>
												</thead>
												<tbody style="color: #748092; font-size: 14px;">
													@foreach ( $orders as $order)
													<tr>
														<td>{{$order->id}}</td>
														<!-- <td><input type="checkbox" name="" id=""></td> -->
														<td>{{$order->fullname}}</td>
														<td>{{$order->count_product}}</td>
														<td>{{formatPrice($order->shipping_total)}}</td>
														<td>{{formatPrice($order->total)}}</td>
														<td>{{formatPrice($order->total+$order->shipping_total)}}</td>
														<td>@if(!$order->handler) Chưa có @else {{$order->handler}}@endif</td>
														<td>{{date('d-m-Y H:i:s', strtotime($order->created_at))}}</td>
														<td class="change-status-{{$order->id}}">{!! orderStatus($order->status) !!}</td>
														<td>
															<div class="input-group">
																<a href="{{route('order.detail', ['order' => $order->id])}}" class="btn btn-info">Xem</a>
																<button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{-- <i class="fas fa-angle-down"></i></button>
																 <ul class="dropdown-menu dropdown-menu-end">
																	@if($order->status != 4)
																	<li><a class="dropdown-item" href="#" onclick="orderDestroy({{$order->id}})">Hủy</a></li>
																	@endif
																	<li><a class="dropdown-item" href="#" onclick="orderDelete(this,{{$order->id}})">Xóa</a></li>
																</ul> --}}
															</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="{{asset('/public/admin/js/shipping/shipping.js')}}"></script>
<script src="{{asset('/public/admin/js/order.js')}}"></script>
@endsection