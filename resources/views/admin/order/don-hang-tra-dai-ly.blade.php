@extends('admin.layouts.master')
@section('content')
	<script>
		$(function () {
			$("#datepicker1").datepicker();
			$("#datepicker2").datepicker();
		});
	</script>
	<link rel="stylesheet" href="{{asset('/public/admin/css/khuyenmai.css')}}">

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
											<span  class="caption-subject"><i class="fas fa-cart-plus"></i> DANH SÁCH ĐƠN HÀNG</span>
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
												<button type="button" class="btn btn-success" style="max-width: 400px; background-color: #11101D; color: #fff;">
													<str>Tổng doanh thu trong tháng</str><br>
													<span
														style="font-size: 20px; font-weight: bold; text-align: left;">8,662,500</span>
												</button>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-10">
												<div class="row g-2">
													<div class="col-md-1">
														<select class="form-select" name="" id="">
															<option value="">10</option>
															<option value="">20</option>
															<option value="">30</option>
														</select>
													</div>
													<div class="col-md-3">
														<div class="dropdown">
															<button class="form-select" data-bs-toggle="dropdown"
																aria-expanded="false">
																Chọn chi nhánh
															</button>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="#">
																		<input type="text" class="form-control" name=""
																			id="">
																	</a>
																</li>
																<li><a class="dropdown-item" href="#">Văn phòng tập
																		đoàn</a></li>
																<li><a class="dropdown-item" href="#">Chi nhánh Đà
																		Nẵng</a></li>


															</ul>
														</div>
													</div>
													<div class="col-md-3">
														<div class="dropdown">
															<button class="form-select" data-bs-toggle="dropdown"
																aria-expanded="false">
																Chọn kênh
															</button>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="#">
																		<input type="text" class="form-control" name=""
																			id="">
																	</a>
																</li>
																<li><a class="dropdown-item" href="#">GT</a></li>
																<li><a class="dropdown-item" href="#">MT</a></li>
															</ul>
														</div>
													</div>
													<div class="col-md-3">
														<div class="dropdown">
															<button class="form-select" data-bs-toggle="dropdown"
																aria-expanded="false">
																Chọn chi nhánh NPP
															</button>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="#">
																		<input type="text" class="form-control" name=""
																			id="">
																	</a>
																</li>
																<li><a class="dropdown-item" href="#">Perfectone Ha
																		Noi</a></li>



															</ul>
														</div>
													</div>
													<div class="col-md-3">
														<div class="dropdown">
															<button class="form-select" data-bs-toggle="dropdown"
																aria-expanded="false">
																Chọn địa điểm
															</button>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="#">
																		<input type="text" class="form-control" name=""
																			id="">
																	</a>
																</li>
																<li><a class="dropdown-item" href="#">AMAZING
																		DISTRIBUTOR</a></li>
																<li><a class="dropdown-item" href="#">VINMART</a></li>
																<li><a class="dropdown-item" href="#">MEDIAMART</a></li>
																<li><a class="dropdown-item" href="#">Điện máy xanh</a>
																</li>
																<li><a class="dropdown-item" href="#">GMO-Z.com
																		RUNSYSTEM</a></li>


															</ul>
														</div>
													</div>

													<div class="col-md-3">
														<div class="dropdown">
															<button class="form-select" data-bs-toggle="dropdown"
																aria-expanded="false">
																Chọn người phụ trách
															</button>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="#">
																		<input type="text" class="form-control" name=""
																			id="">
																	</a>
																</li>
																<li><a class="dropdown-item"
																		href="#">Salerep01(Salerep01)</a></li>


															</ul>
														</div>
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="" id="datepicker1"
															placeholder="Từ ngày">
													</div>
													<div class="col-md-2">
														<input type="text" class="form-control" name="" id="datepicker2"
															placeholder="Đến ngày">
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="input-group" style="width: 100%;">
													<input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
													<span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12" style="overflow-x: auto;">
												<table class="table table-hover align-middle">
													<thread>
														<tr>
															<th class="title">STT</th>
															<th class="title">Mã đơn hàng trả</th>
															<th class="title">Mã đơn hàng gốc</th>
															<th class="title">Thương hiệu</th>
															<th class="title">Đại lý</th>
															<th class="title">Chi nhánh công ty</th>
															<th class="title">Kênh</th>
															<th class="title">Nhà phân phối</th>
															<th class="title">Chi nhánh NPP</th>
															<th class="title">Phụ trách</th>
															<th class="title">Số lượng</th>
															<th class="title">Tổng tiền</th>
															<th class="title">Ngày trả</th>
															<th class="title">Người cập nhật</th>
															<th class="title">Ngày cập nhật</th>
															<th class="title" style="width: 10%;">Trạng thái</th>
														</tr>
													</thread>
													<tbody style="color: #748092; font-size: 14px;">
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td>
																<div class="input-group">
																	<span class="btn_trangthai status_active">Hoạt động</span>
																	<button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-angle-down"></i></button>
																	<ul class="dropdown-menu dropdown-menu-end">
																	  <li><a class="dropdown-item" href="#">Xóa</a></li>
																	  <li><a class="dropdown-item" href="#">Ngừng</a></li>
																	</ul>
																</div>
															</td>
														</tr>

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
@endsection