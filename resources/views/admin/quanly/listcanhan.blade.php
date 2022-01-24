@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/css/doitac.css') }}">
<link rel="stylesheet" href="{{ asset('/public/admin/table/table.css') }}" type="text/css">

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
							<div class="team__filter-left col-lg-12 p-0">
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
<!----------------- Table information user ----------------->
								<div class="pt-2">
									<table class="styled-table table-sortable" id="myTable" style="width: 100%;">
										<thead>
											<tr>
												<th>STT</th>
												<th>Mã đại lý</th>
												<th>Họ tên</th>
												<th>Số điện thoại</th>
												<th>Phường/xã</th>
												<th>Quận/huyện</th>
												<th>Tỉnh/thành</th>
												<th>Mã đại lý cấp trên</th>
												<th>Chi tiết</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($user as $value)
											<tr>
												<td>{{$value->id}}</td>
												<td>{{$value->code_user}}</td>
												<td>{{$value->name}}</td>
												<td>{{$value->phone}}
												<td>{{DB::table('ward')->where('maphuongxa', $value->id_ward)
													->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
												<td>{{DB::table('district')->where('maquanhuyen', $value->id_district)
													->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</td>
												<td>{{DB::table('province')->where('matinhthanh', $value->id_province)
													->select('tentinhthanh')->first()->tentinhthanh ?? ''}}</td>
												<td></td>
												<td><a href="#" class="form-control btn btn-primary" style="background-color: #11101d;">Xem</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>	
								</div>
<!----------------- Table information user ----------------->
							</div>
						</div>
					</div>
				</div>
				<!-- end filter -->


			</div>
		</div>
  	</section>
<script type="text/javascript" src="{{asset('public/admin/table/table.js')}}"></script>
@endsection