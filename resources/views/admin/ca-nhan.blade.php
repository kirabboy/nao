@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">

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
				  <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm <i class="fa fa-angle-down fs-4 float-end"></i></span>
				  <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="doi-nhom.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="ca-nhan.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="thong-tin-ban-hang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
					  </li>
				  </ul>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				<span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-sanpham" role="button" aria-expanded="false" aria-controls="menu-mobile-sanpham"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm <i class="fa fa-angle-down fs-4 float-end"></i></span>
				<ul class="p-0 menu-child collapse" id="menu-mobile-sanpham">
					<li class="list-group-item p-0 list-group-item-action">
						<a href="nganh-nhom-hang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Ngành/Nhóm hàng</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-vi-tinh.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn vị tính</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="san-pham.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin sản phẩm</a>
					</li>
				</ul>
			</li>
			<li class="list-group-item p-0 list-group-item-action">
				<span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-baocao" role="button" aria-expanded="false" aria-controls="menu-mobile-baocao"><i class="fa fa-bar-chart-o"></i> Báo cáo <i class="fa fa-angle-down fs-4 float-end"></i></span>
				<ul class="p-0 menu-child collapse" id="menu-mobile-baocao">
					<li class="list-group-item p-0 list-group-item-action">
						<a href="ket-qua-dao-tao.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Kết quả đào tạo</a>
					</li>
				</ul>
			</li>
			<li class="list-group-item p-0 list-group-item-action">
				<span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-khuyenmai" role="button" aria-expanded="false" aria-controls="menu-mobile-khuyenmai"><i class="fa fa-bar-chart-o"></i> Cài đặt khuyến mãi <i class="fa fa-angle-down fs-4 float-end"></i></span>
				<ul class="p-0 menu-child collapse" id="menu-mobile-khuyenmai">
					<li class="list-group-item p-0 list-group-item-action">
						<a href="cau-hinh-khuyen-mai.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cấu hình khuyến mãi</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="loai-khuyen-mai.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Loại khuyến mãi</a>
					</li>
				</ul>
			</li>
			<li class="list-group-item p-0 list-group-item-action">
				<span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-banhang" role="button" aria-expanded="false" aria-controls="menu-mobile-banhang"><i class="fa fa-bar-chart-o"></i> Bán hàng <i class="fa fa-angle-down fs-4 float-end"></i></span>
				<ul class="p-0 menu-child collapse" id="menu-mobile-banhang">
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-hang-cnpp.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn hàng CN NPP</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-hang-tra-chi-nhanh-npp.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn hàng trả CN NPP</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-hang-dai-ly.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn hàng đại lý</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-hang-tra-dai-ly.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn hàng trả đại lý</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="don-hang-doi-thu-dai-ly.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đơn hàng đối thủ đại lý</a>
					</li>
				</ul>
			</li>
			<li class="list-group-item p-0 list-group-item-action">
				<span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-ton-kho" role="button" aria-expanded="false" aria-controls="menu-mobile-ton-kho"><i class="fa fa-bar-chart-o"></i> Tồn kho <i class="fa fa-angle-down fs-4 float-end"></i></span>
				<ul class="p-0 menu-child collapse" id="menu-mobile-ton-kho">
					<li class="list-group-item p-0 list-group-item-action">
						<a href="ton-kho-CNNPP.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Tồn kho CN NPP</a>
					</li>
					<li class="list-group-item p-0 list-group-item-action">
						<a href="ton-kho-dai-ly.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Tồn kho đại lý</a>
					</li>
				</ul>
			</li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
			  </li>
		  </ul>
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
							<div class="team__filter-left col-lg-10">
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
											<li><a class="dropdown-item" href="#">Tỉnh Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Quảng Bình</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Bắc Ninh</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Khánh Hoà</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Phú Thọ</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Tiền Giang</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Thái Bình</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Hậu Giang</a></li>
											<li><a class="dropdown-item" href="#">Tỉnh Yên Bái</a></li>
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
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Huyện Quảng Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bắc Ninh</a></li>
											<li><a class="dropdown-item" href="#">Huyện Khánh Hoà</a></li>
											<li><a class="dropdown-item" href="#">Huyện Phú Thọ</a></li>
											<li><a class="dropdown-item" href="#">Huyện Tiền Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Thái Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Hậu Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Yên Bái</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Vùng
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<li><a class="dropdown-item" href="#">Huyện Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Huyện Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Huyện Quảng Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bắc Ninh</a></li>
											<li><a class="dropdown-item" href="#">Huyện Khánh Hoà</a></li>
											<li><a class="dropdown-item" href="#">Huyện Phú Thọ</a></li>
											<li><a class="dropdown-item" href="#">Huyện Tiền Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Thái Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Hậu Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Yên Bái</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Kênh
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<li><a class="dropdown-item" href="#">Huyện Vĩnh Long</a></li>
											<li><a class="dropdown-item" href="#">Huyện Đồng Tháp</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bến Tre</a></li>
											<li><a class="dropdown-item" href="#">Huyện Quảng Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Bắc Ninh</a></li>
											<li><a class="dropdown-item" href="#">Huyện Khánh Hoà</a></li>
											<li><a class="dropdown-item" href="#">Huyện Phú Thọ</a></li>
											<li><a class="dropdown-item" href="#">Huyện Tiền Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Thái Bình</a></li>
											<li><a class="dropdown-item" href="#">Huyện Hậu Giang</a></li>
											<li><a class="dropdown-item" href="#">Huyện Yên Bái</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chọn nhà phân phối
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<input type="search" class="form-control m-1 w-auto search_city" name="" id="">
											<li><a class="dropdown-item" href="#">VINMART</a></li>
											<li><a class="dropdown-item" href="#">AMAZING DISTRIBUTOR</a></li>
											<li><a class="dropdown-item" href="#">MEDIAMART</a></li>
											<li><a class="dropdown-item" href="#">Điện máy xanh</a></li>
											<li><a class="dropdown-item" href="#">GMO-Z.com RUNSYSTEM</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Chi nhánh NPP
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<input type="search" class="form-control m-1 w-auto search_city" name="" id="">
											<li><a class="dropdown-item" href="#">Perfectone Ha Noi</a></li>
										</ul>
									</div>
									<div class="dropdown w-200">
										<button class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											Xếp hạng
										</button>
										<ul class="dropdown-menu p-0 team__filter-address font-size-1" aria-labelledby="dropdownMenuButton1">
											<input type="search" class="form-control m-1 w-auto search_city" name="" id="">
											<li><a class="dropdown-item" href="#">A</a></li>
											<li><a class="dropdown-item" href="#">B</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="team__filter-right col-lg-2">
								<input type="search" style="height: 36px;" class="form-control form-control-sm" name="" id="" placeholder="Tìm kiếm">
							</div>
						</div>
					</div>
					
					<div class="filter__status mt-2">
						<button class="btn active text-white font-size-1">Hoạt động <span>(31)</span></button>
						<button class="btn new text-white font-size-1">Mới <span>(1)</span></button>
						<button class="btn stop text-white font-size-1">Ngừng <span>(4)</span></button>
					</div>
				</div>
				<!-- end filter -->

				<!-- table -->
				<div class="table__container mt-2 w-100" style="overflow: auto;">
					<table class="table table-hover" style="width:130%">
						<thead class="table__daily">
						  <tr style="vertical-align: top;">
							<th scope="col">STT</th>
							<th scope="col">Mã đại lý</th>
							<th scope="col">Họ tên</th>
							<th scope="col">Số CMND</th>
							<th scope="col" style="width:100px">CMND mặt trước</th>
							<th scope="col" style="width:100px">CMND mặt sau</th>
							<th scope="col">Số điện thoại</th>
							<th scope="col">Số nhà/Đường</th>
							<th scope="col">Phường/Xã</th>
							<th scope="col">Quận/Huyện</th>
							<th scope="col">Tỉnh/TP</th>
							<th scope="col">Số tài khoản</th>
							<th scope="col" style="width:100px">Họ tên trên thẻ</th>
							<th scope="col">Ngân hàng</th>
							<th scope="col">Chi nhánh</th>
							<th scope="col" style="width:100px">Cấp bậc hiện tại</th>
							<th scope="col" style="width:100px">Mã đại lý cấp trên</th>
							<th scope="col" style="min-width: 115px;">Trạng thái</th>
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
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white active" aria-label="Text input with dropdown button">Hoạt động</span>
									<button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									<ul class="dropdown-menu dropdown-menu-end">
									  <li><a class="dropdown-item" href="#">Ngừng</a></li>
									  <li><a class="dropdown-item" href="#">Xoá</a></li>
									</ul>
								</div>
							</td>
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
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white new" aria-label="Text input with dropdown button">Mới</span>
									<button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									<ul class="dropdown-menu dropdown-menu-end">
									  <li><a class="dropdown-item" href="#">Ngừng</a></li>
									  <li><a class="dropdown-item" href="#">Hoạt động</a></li>
									  <li><a class="dropdown-item" href="#">Xoá</a></li>
									</ul>
								</div>
							</td>
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
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white stop" aria-label="Text input with dropdown button">Ngừng</span>
									<button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									<ul class="dropdown-menu dropdown-menu-end">
									  <li><a class="dropdown-item" href="#">Hoạt động</a></li>
									  <li><a class="dropdown-item" href="#">Xoá</a></li>
									</ul>
								</div>
							</td>
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
		<!-- end Team -->

		<!-- footer -->
		<div class="d-flex justify-content-center pb-1 mt-4">
			<span class="footer__copyright">Copyright©2005-2021 . All rights reserved</span>
		</div>
		<!-- end footer -->

		<!-- scroll top -->
		<div class="scroll__top">
			<a href="#"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
		</div>
		<!-- end scroll top -->
  	</section>
@endsection