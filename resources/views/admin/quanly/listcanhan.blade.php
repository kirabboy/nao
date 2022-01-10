@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">

  	<section class="home-section">
		<div class="header bg-white shadow-sm header_mobile">
		</div>
		<!-- Team -->
		<div class="team m-3">
			<div class="team_container py-3 px-4">
				<div class="team__top d-flex justify-content-between team-mobile">
					<div class="team__top-left d-flex align-items-center team-mobile">
						<div class="d-flex">
							<i class="fa fa-user-o team_bars me-2" aria-hidden="true"></i>
							<h4 class="mb-0 me-4 text-uppercase fs-5 text-center">Danh sách khách hàng</h4>
						</div>
						<button class="border-0 rounded-pill p-1 btn_team-top px-3 team-mobile-btn"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
					</div>
				</div>
				<hr>
				<!-- filter -->
				<div class="filter__address">
					<div class="team__filter">
						<div class="row">
							<div class="team__filter-left col-lg-12">
								<div class="col-md-12 flex-box gap-2">
									<div>
										<select class="form-select form-select-sm w-auto text-color-333 font-size-1 w-100" style="height:35px" aria-label="Default select example">
											<option selected>10</option>
											<option value="1">10</option>
											<option value="2">25</option>
											<option value="3">50</option>
											<option value="3">100</option>
										</select>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chọn tỉnh/thành phố
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<input type="search" class="form-control m-1 w-auto search_city" name="" id="">
											<li><a class="dropdown-item" href="#">Tỉnh Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Bến Tre</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chọn quận/huyện
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<input type="search" class="form-control m-1 w-auto search_city" name="" id="">
											<li><a class="dropdown-item" href="#">Huyện Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Huyện Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chọn phường/xã
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<li><a class="dropdown-item" href="#">Huyện Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Huyện Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chọn phường/xã
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<li><a class="dropdown-item" href="#">Huyện Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Huyện Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
										</ul>
									</div>
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" name="" id="" placeholder="Tìm kiếm số điện thoại">
									</div>
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" name="" id="" placeholder="Tìm kiếm mã đại lý">
									</div>
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" name="" id="" placeholder="Tìm kiếm mã đại lý cấp trên">
									</div>
									<div class="dropdown w-200"> 
										<button class="btn btn-success"> Cấp bậc hiện tại</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- end filter -->

				<!-- table -->
				<div class="table__container mt-2 w-100" style="overflow: auto;">
					<table class="table table-hover" style="width:130%">
						<thead class="table__daily">
						  <tr style="vertical-align: top;">
							<th>STT</th>
							<th>Mã đại lý</th>
							<th>Họ tên</th>
							<th>Số CMND</th>
							<th>CMND mặt trước</th>
							<th>CMND mặt sau</th>
							<th>Số điện thoại</th>
							<th>Số nhà/Đường</th>
							<th>Phường/Xã</th>
							<th>Quận/Huyện</th>
							<th>Tỉnh/TP</th>
							<th>Số tài khoản</th>
							<th>Họ tên trên thẻ</th>
							<th>Ngân hàng</th>
							<th>Chi nhánh</th>
							<th>Cấp bậc hiện tại</th>
							<th>Mã đại lý cấp trên</th>
							<th>Thông tin bán hàng</th>
						  </tr>
						</thead>
						<tbody class="font-size-1">
						  <tr>
							<th scope="row">1</th>
							<td>DL001</td>
							<td>Nguyễn Thị B</td>
							<td>212881306</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>0347689482</td>
							<td>41/58A Cầy Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>123456789</td>
							<td>Nguyễn Thị B</td>
							<td>Vietinbank</td>
							<td>ABC</td>
							<td>Cấp 1</td>
							<td>DLCT01</td>
							<td><a href="{{url('/admin/canhan/chitiet')}}">Xem chi tiết</a></td>
						  </tr>
						  <tr>
							<th scope="row">1</th>
							<td>DL001</td>
							<td>Nguyễn Thị B</td>
							<td>212881306</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>0347689482</td>
							<td>41/58A Cầy Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>123456789</td>
							<td>Nguyễn Thị B</td>
							<td>Vietinbank</td>
							<td>ABC</td>
							<td>Cấp 1</td>
							<td>DLCT01</td>
							<td><a href="{{url('/admin/canhan/chitiet')}}">Xem chi tiết</a></td>
						  </tr>
						  <tr>
							<th scope="row">1</th>
							<td>DL001</td>
							<td>Nguyễn Thị B</td>
							<td>212881306</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>
								<img src="{{asset('/public/images/cmndmattruoc.jpg')}}" class="w-100" alt="">
							</td>
							<td>0347689482</td>
							<td>41/58A Cầy Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>123456789</td>
							<td>Nguyễn Thị B</td>
							<td>Vietinbank</td>
							<td>ABC</td>
							<td>Cấp 1</td>
							<td>DLCT01</td>
							<td><a href="{{url('/admin/canhan/chitiet')}}">Xem chi tiết</a></td>
						  </tr>
						</tbody>
					</table>
					
				</div>

				<!-- panigation -->
				<div class="d-flex flex-row-reverse mt-4 pani">
					<nav aria-label="Page navigation example">
						<ul class="pagination pagination-sm">
						  <li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
							  <span aria-hidden="true">&laquo;</span>
							</a>
						  </li>
						  <li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
							  <span aria-hidden="true" style="font-size: 0.8rem;">&lt;</span>
							</a>
						  </li>
						  <li class="page-item active"><a class="page-link" href="#">1</a></li>
						  <li class="page-item"><a class="page-link" href="#">2</a></li>
						  <li class="page-item"><a class="page-link" href="#">3</a></li>
						  <li class="page-item"><a class="page-link" href="#">4</a></li>
						  <li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
							  <span aria-hidden="true" style="font-size: 0.8rem;">&gt;</span>
							</a>
						  </li>
						  <li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
							  <span aria-hidden="true">&raquo;</span>
							</a>
						  </li>
						</ul>
					  </nav>
				</div>
				<!-- end panigation -->

				<!-- end table -->
			</div>
		</div>
  	</section>
@endsection