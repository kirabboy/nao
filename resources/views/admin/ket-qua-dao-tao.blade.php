@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/quanlysanpham.css')}}">
	

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
		<!-- end menu mobile -->
			<div class="m-3">
				<div class="wrapper bg-white p-4">
					<div class="portlet-title d-flex justify-content-between align-items-center">
                        <div class="title-name d-flex align-items-center">
							<div class="caption">
								<i class="fa fa-bar-chart icon-drec" aria-hidden="true"></i>
								<span class="caption-subject text-uppercase">
									Báo cáo </span> 
								<span class="caption-helper"></span>
							</div>
							<div class="ps-5">
								<a href="#group_category_create" data-toggle="modal" class="btn btn-add"><i class="fa fa-plus"></i>
									Thêm mới </a>
								<a href="#group_category_create" data-toggle="modal" class="btn btn-add"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
									Import </a>
								<a href="#group_category_create" data-toggle="modal" class="btn btn-add"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
									Export </a>
							</div>
						</div>
                    </div>
					<hr>
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
						  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tổng hợp kiểm tra</button>
						  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Chi tiết kiểm tra</button>
						</div>
					  </nav>
					  <div class="tab-content" id="nav-tabContent" style="border: 1px solid #eee;">
						<div class="tab-pane fade show active m-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="portlet-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="col-md-12 flex-row gap-2">
											<select class="form-select fs-14" aria-label="Default select example">
												<option selected>10</option>
												<option value="1">25</option>
												<option value="2">50</option>
												<option value="3">100</option>
											</select>
											<div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
												<button class="btn dropdown-toggle fs-14 text-start d-flex justify-content-between align-items-center" style="width: 150px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
													Mã đại lý
												</button>
												<ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
												  <li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
												  <li><a class="dropdown-item" href="#">POSM</a></li>
												  <li><a class="dropdown-item" href="#">Khác</a></li>
												  <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
												  <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
												  <li><a class="dropdown-item" href="#">Sebia</a></li>
												</ul>
											</div>
											<div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
												<button class="btn dropdown-toggle fs-14 fs-14 text-start d-flex justify-content-between align-items-center" style="width: 150px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
													Tên đại lý
												</button>
												<ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
												  <li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
												  <li><a class="dropdown-item" href="#">POSM</a></li>
												  <li><a class="dropdown-item" href="#">Khác</a></li>
												  <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
												  <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
												  <li><a class="dropdown-item" href="#">Sebia</a></li>
												</ul>
											</div>
											<div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
												<button class="btn dropdown-toggle fs-14 text-start d-flex justify-content-between align-items-center" style="width: 150px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
													Mã đơn hàng
												</button>
												<ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
												  <li class="ps-2 pe-2"><input class="p-1" style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;" type="text"></li>
												  <li><a class="dropdown-item" href="#">POSM</a></li>
												  <li><a class="dropdown-item" href="#">Khác</a></li>
												  <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
												  <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
												  <li><a class="dropdown-item" href="#">Sebia</a></li>
												</ul>
											</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<div class="col-md-12">
											<div class="input-group" style="width: 100%;">
												<input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
												<span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
											</div>
										</div>
									</div>
								</div>
		
		
								<div class="pt-3"  style="overflow-x: auto;">
									<table class="table table-hover table-main">
										<thead class="thead1" style="vertical-align: middle;">
											<tr>
												<th class="title-text" style="width: 2%">
													STT </th>
												<th class="title-text">
													Mã đại lý
												</th>
												<th class="title-text" style="width: 12%">
													Tên đại lý
												</th>
												<th class="title-text">
													Mã đơn hàng
												</th>
												<th class="title-text">
													Mã sản phẩm
												</th>
												<th class="title-text">
													Tên sản phẩm
												</th>
												<th class="title-text">
													Từ ngày
												</th>
												<th class="title-text">
													Đến ngày
												</th>
												<th class="title-text">
													Tháng
												</th>
												<th class="title-text">
													Năm
												</th>
											</tr>
										</thead>
										<tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
											<tr>
												<td>1</td>
												<td>VD</td>
												<td>Vũ Đức</td>
												<td>DH001</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>26</td>
												<td>30</td>
												<td>8</td>
												<td>2021</td>
											</tr>
											<tr>
												<td>2</td>
												<td>VD</td>
												<td>Vũ Đức</td>
												<td>DH001</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>26</td>
												<td>30</td>
												<td>8</td>
												<td>2021</td>
											</tr>
											<tr>
												<td>3</td>
												<td>VD</td>
												<td>Vũ Đức</td>
												<td>DH001</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>26</td>
												<td>30</td>
												<td>8</td>
												<td>2021</td>
											</tr>
											<tr>
												<td>4</td>
												<td>VD</td>
												<td>Vũ Đức</td>
												<td>DH001</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>26</td>
												<td>30</td>
												<td>8</td>
												<td>2021</td>
											</tr>
											<tr>
												<td>5</td>
												<td>VD</td>
												<td>Vũ Đức</td>
												<td>DH001</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>26</td>
												<td>30</td>
												<td>8</td>
												<td>2021</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade m-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="portlet-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="col-md-12 flex-row gap-2">
											<select class="form-select fs-14" aria-label="Default select example">
												<option selected>10</option>
												<option value="1">25</option>
												<option value="2">50</option>
												<option value="3">100</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="col-md-12">
											<div class="input-group" style="width: 100%;">
												<input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
												<span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
											</div>
										</div>
									</div>
								</div>
		
		
								<div class="pt-3"  style="overflow-x: auto;">
									<table class="table table-hover table-main">
										<thead class="thead1" style="vertical-align: middle;">
											<tr>
												<th class="title-text" style="width: 2%">
													STT </th>
												<th class="title-text">
													Mã đại lý
												</th>
												<th class="title-text" style="width: 12%">
													Họ và tên
												</th>
												<th class="title-text">
													Mã sản phẩm
												</th>
												<th class="title-text">
													Tên sản phẩm
												</th>
												<th class="title-text">
													Số lượng
												</th>
												<th class="title-text">
													Đơn giá
												</th>
												<th class="title-text">
													Thành tiền
												</th>
												<th class="title-text">
													Mã đơn hàng
												</th>
												<th class="title-text">
													Ngày giao hang
												</th>
												<th class="title-text">
													Đại lý cấp trên
												</th>
											</tr>
										</thead>
										<tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
											<tr>
												<td>1</td>
												<td>VD</td>
												<td>Nguyễn Trung</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>2</td>
												<td>590,000 đ</td>
												<td>1,180,000 đ</td>
												<td>DH0001</td>
												<td>27/8/2021</td>
												<td>Mevivu</td>
											</tr>
											<tr>
												<td>2</td>
												<td>VD</td>
												<td>Nguyễn Trung</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>2</td>
												<td>590,000 đ</td>
												<td>1,180,000 đ</td>
												<td>DH0001</td>
												<td>27/8/2021</td>
												<td>Mevivu</td>
											</tr>
											<tr>
												<td>3</td>
												<td>VD</td>
												<td>Nguyễn Trung</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>2</td>
												<td>590,000 đ</td>
												<td>1,180,000 đ</td>
												<td>DH0001</td>
												<td>27/8/2021</td>
												<td>Mevivu</td>
											</tr>
											<tr>
												<td>4</td>
												<td>VD</td>
												<td>Nguyễn Trung</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>2</td>
												<td>590,000 đ</td>
												<td>1,180,000 đ</td>
												<td>DH0001</td>
												<td>27/8/2021</td>
												<td>Mevivu</td>
											</tr>
											<tr>
												<td>5</td>
												<td>VD</td>
												<td>Nguyễn Trung</td>
												<td>XNK</td>
												<td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
												<td>2</td>
												<td>590,000 đ</td>
												<td>1,180,000 đ</td>
												<td>DH0001</td>
												<td>27/8/2021</td>
												<td>Mevivu</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					  </div>
				</div>
			</div>
			<div class="footer text-center">
				<spans style="font-size: 12px;">Copyright©2005-2021 . All rights reserved</spans>
			</div>
		</section>
@endsection