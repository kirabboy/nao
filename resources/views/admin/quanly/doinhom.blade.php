@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">


	<!-- main -->
	<section class="home-section">
	  <div class="header bg-white shadow-sm header_mobile">
	  </div>
	  <!-- Team -->
	  <div class="team m-3">
		  <div class="team_container py-3 px-4">
			  <div class="team__top d-flex justify-content-between team-mobile">
				  <div class="team__top-left d-flex align-items-center team-mobile">
					  <div class="d-flex">
						  <i class="fa fa-bars team_bars me-2" aria-hidden="true"></i>
						  <h4 class="mb-0 me-4 text-uppercase fs-5 team-title">Đội nhóm</h4>
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
	</section>
	<!-- main -->

@endsection