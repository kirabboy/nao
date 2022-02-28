@extends('admin.layouts.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/dashboard.css') }}">
    <script src="{{ asset('public/admin/js/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin/js/serial.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('public/admin/css/amcharts.css') }}" type="text/css">

  	<section class="home-section">

		<!-- menu mobile -->
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
						  <a href="{{ URL::to('/admin/doinhom') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/canhan') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
					  </li>
					  <!-- <li class="list-group-item p-0 list-group-item-action">
						  <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
					  </li> -->
				  </ul>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-sanpham" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm <i class="fa fa-angle-down fs-4 float-end"></i></span>
				  <ul class="p-0 menu-child collapse" id="menu-mobile-sanpham">
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/nganh-nhom-hang') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Ngành/Nhóm hàng</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/thuong-hieu') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thương hiệu/Đơn vị tính</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/don-vi-tinh') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn vị tính</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/san-pham') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin sản phẩm</a>
					  </li>
				  </ul>
			  </li>

			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
			  </li>
			  
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
			  </li>

			  <li class="list-group-item p-0 list-group-item-action">
				  <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-setting" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
				  <ul class="p-0 menu-child collapse" id="menu-mobile-setting">
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/cau-hinh-van-chuyen') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cấu hình vận chuyển</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="{{ URL::to('/admin/cau-hinh-bank') }}" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cấu hình chuyển khoản</a>
					  </li>
				  </ul>
			  </li>
		  </ul>
		</div>
		<!-- end menu mobile -->


  		<!-- <div class="m-3">
  			<div class="row">
  				<div class="col-sm-6" id="title_tinhhinh">
      				<div class="text">Tình hình đang như thế nào ?</div>
  				</div>
  				<div class="col-sm-2 align-self-center text-end" id="col_find_button">
					<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Chi nhánh NPP/Đại lý
					</button>
					<ul class="dropdown-menu">
						<li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
						<li><a class="dropdown-item" href="#">Cả hai</a></li>
						<li><a class="dropdown-item" href="#">Chi nhánh NPP</a></li>
						<li><a class="dropdown-item" href="#">Đại lý</a></li>
					</ul>
  				</div>
  				<div class="col-sm-2 align-self-center text-end" id="col_find_button">
					<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Đơn hàng
					</button>
                    <ul class="dropdown-menu">
                        <li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
                        <li><a class="dropdown-item" href="#">Cả hai</a></li>
                        <li><a class="dropdown-item" href="#">Chi nhánh NPP</a></li>
                        <li><a class="dropdown-item" href="#">Đại lý</a></li>
                    </ul>
  				</div>
  				<div class="col-sm-2 align-self-center text-end" id="col_find_button">
					<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Chọn đối tượng báo cáo
					</button>
                    <ul class="dropdown-menu">
                        <li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
                        <li><a class="dropdown-item" href="#">Cả hai</a></li>
                        <li><a class="dropdown-item" href="#">Chi nhánh NPP</a></li>
                        <li><a class="dropdown-item" href="#">Đại lý</a></li>
                    </ul>
  				</div>
  			</div>
  		</div> -->

  		<!-- <div class="container-fluid" id="info_month">
  			<div class="row">
  				<div class="col-sm-3 p-3">
  					<div class="row bg-white m-0">
  						<div class="col-sm-10 col-10">
  							<p class="m-0 mt-2">Doanh thu hôm nay</p>
  							<h4 class="text-danger">0 vnđ</h4>
  						</div>
  						<div class="col-sm-2 col-2 text-end">
  							<i class="fa fa-usd mt-2" aria-hidden="true" style="font-size: 24px;"></i>
  						</div>
  					</div>
  				</div>
  				<div class="col-sm-3 p-3">
  					<div class="row bg-white m-0">
  						<div class="col-sm-10 col-10">
  							<p class="m-0 mt-2">Doanh số hôm nay</p>
  							<h4 class="text-danger">0 sản phẩm</h4>
  						</div>
  						<div class="col-sm-2 col-2 text-end">
  							<i class="fa fa-archive mt-2" aria-hidden="true" style="font-size: 24px;"></i>
  						</div>
  					</div>
  				</div>
  				<div class="col-sm-3 p-3">
  					<div class="row bg-white m-0">
  						<div class="col-sm-10 col-10">
  							<p class="m-0 mt-2">Doanh thu hôm nay</p>
  							<h4 class="text-danger">32 / mới : 0</h4>
  						</div>
  						<div class="col-sm-2 col-2 text-end">
  							<i class="fa fa-map-marker mt-2" aria-hidden="true" style="font-size: 24px;"></i>
  						</div>
  					</div>
  				</div>
  				<div class="col-sm-3 p-3">
  					<div class="row bg-white m-0">
  						<div class="col-sm-10 col-10">
  							<p class="m-0 mt-2">Doanh thu hôm nay</p>
  							<h4 class="text-danger">0%</h4>
  						</div>
  						<div class="col-sm-2 text-end col-2">
  							<i class="fa fa-thumbs-o-up mt-2" aria-hidden="true" style="font-size: 24px;"></i>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section> -->

@endsection