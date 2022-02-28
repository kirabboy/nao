@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/css/doitac.css') }}">
<link rel="stylesheet" href="{{ asset('/public/admin/table/table.css') }}" type="text/css">


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
						  <!-- <button class="border-0 rounded-pill p-1 btn_team-top px-3"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
						  <button class="border-0 rounded-pill p-1 btn_team-top px-3 mx-1"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Import</button> -->
						  <!-- <button class="border-0 rounded-pill p-1 btn_team-top px-3"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button> -->
					  </div>
				  </div>
			  </div>
			  <!-- table -->
			  <div class="table__container mt-2" style="overflow-x: auto;">
			  	<table class="styled-table table-sortable" id="myTable" style="width: 100%;">
					  <thead>
						<tr>
						  <th scope="col">STT</th>
						  <th scope="col">Mã đại lý</th>
						  <th scope="col">Họ tên</th>
						  <th scope="col">Số điện thoại</th>
						  <th scope="col">Phường/Xã</th>
						  <th scope="col">Quận/Huyện</th>
						  <th scope="col">Tỉnh/TP</th>
						  <th scope="col">Level</th>
						  <th scope="col">Mã cấp trên</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach ($user as $value)
						<tr>
						  	<th scope="row">{{$value->id}}</th>
						  	<td><a href="{{route('listdoinhom')}}/{{$value->id}}">{{$value->code_user}}</a></td>
						  	<td>{{$value->name}}</td>
						  	<td>0{{$value->phone}}</td>
						  	<td>{{DB::table('ward')->where('maphuongxa', $value->id_ward)
								->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
						  	<td>{{DB::table('district')->where('maquanhuyen', $value->id_district)
								->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</td>
						  	<td>{{DB::table('province')->where('matinhthanh', $value->id_province)
								->select('tentinhthanh')->first()->tentinhthanh ?? ''}}</td>
						  	<td>
							  	@if($value->level == 1)
									Cộng tác viên
								@elseif ($value->level == 2)
									Đại lý chuẩn
								@elseif ($value->level == 3)
									Đại lý tạm thời
								@endif
						  	</td>
						  	<td>{{($value->id_dad->name_dad->code_user)}}</td>
						</tr>
						@endforeach
					  </tbody>
				  </table>
			  </div>
			  
			  <!-- <div class="d-flex flex-row-reverse pt-2">
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
			  </div> -->
		  </div>
	  </div>
	</section>
	<!-- main -->

<script type="text/javascript" src="{{asset('public/admin/table/table.js')}}"></script>
@endsection