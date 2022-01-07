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
		<!-- Team -->
		<div class="team m-3">
			<div class="team_container py-3 px-4">
				<div class="team__top d-flex justify-content-between team-mobile">
					<div class="team__top-left d-flex align-items-center team-mobile">
						<div class="d-flex">
							<i class="fa fa-bars team_bars me-2" aria-hidden="true"></i>
							<h4 class="mb-0 me-4 text-uppercase fs-5 team-title">Thông tin bán hàng</h4>
						</div>
						<div class="team-mobile-btn d-flex align-items-center">
							<button class="border-0 rounded-pill p-1 btn_team-top px-3"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
							<button class="border-0 rounded-pill p-1 btn_team-top px-3 mx-1"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Import</button>
							<button class="border-0 rounded-pill p-1 btn_team-top px-3"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button>
						</div>
					</div>
				</div>
				<!-- table -->
				<div class="table__container mt-2" style="overflow-x: auto;">
					<table class="table table-hover">
						<thead class="table__daily">
						  <tr>
							<th scope="col">STT</th>
							<th scope="col">Mã đại lý</th>
							<th scope="col">Họ tên</th>
							<th scope="col">Số điện thoại</th>
							<th scope="col">Số nhà/Đường</th>
							<th scope="col">Phường/Xã</th>
							<th scope="col">Quận Huyện</th>
							<th scope="col">Tỉnh/TP</th>
							<th scope="col">Cấp bậc hiện tại</th>
							<th scope="col">Mã đại lý cấp trên</th>
							<th scope="col" style="min-width:125px">Trạng thái</th>
						  </tr>
						</thead>
						<tbody class="font-size-1">
						  <tr>
							<th scope="row">1</th>
							<td>DL001</td>
							<td>Nguyễn Thị B</td>
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white active text-center" aria-label="Text input with dropdown button">Hoạt động</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white new  text-center" aria-label="Text input with dropdown button">Mới</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white stop  text-center" aria-label="Text input with dropdown button">Ngừng</span>
									<button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									<ul class="dropdown-menu dropdown-menu-end">
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white active text-center" aria-label="Text input with dropdown button">Hoạt động</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white new  text-center" aria-label="Text input with dropdown button">Mới</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây/td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white stop  text-center" aria-label="Text input with dropdown button">Ngừng</span>
									<button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
									<ul class="dropdown-menu dropdown-menu-end">
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white active text-center" aria-label="Text input with dropdown button">Hoạt động</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white new  text-center" aria-label="Text input with dropdown button">Mới</span>
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
							<td>0347689482</td>
							<td>41/58A Cầu Xây</td>
							<td>Tân Phú</td>
							<td>Quận 9</td>
							<td>TP Hồ Chí Minh</td>
							<td>Cấp 1</td>
							<td>DLCT124</td>
							<td>
								<div class="input-group">
									<span type="text" style="width:61px" class="form-control form-control-sm font-size-s text-white stop  text-center" aria-label="Text input with dropdown button">Ngừng</span>
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
				<div class="d-flex flex-row-reverse">
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
		<!-- Team -->

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