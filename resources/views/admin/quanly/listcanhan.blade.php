@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/css/doitac.css') }}">
<link rel="stylesheet" href="{{ asset('/public/admin/table/table.css') }}" type="text/css">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

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
						<button class="border-0 rounded-pill p-1 btn_team-top px-3 team-mobile-btn">
							<a class="text-light text-decoration-none" href="{{asset('admin/canhan/download')}}">
								<i class="fa fa-plus" aria-hidden="true"></i> Download List
							</a>
						</button>
						<!-- <button class="border-0 rounded-pill p-1 btn_team-top px-3 team-mobile-btn"><i class="fa fa-plus" aria-hidden="true"></i> Download List</button> -->
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
										<form>
											<select id="pagination" class="btn dropdown-toggle search_city-btn text-color-333 font-size-1 w-100 d-flex justify-content-between align-items-center ">
												<option value="5" @if($items == 5) selected @endif >5</option>
												<option value="10" @if($items == 10) selected @endif >10</option>
												<option value="15" @if($items == 15) selected @endif >15</option>
												<option value="20" @if($items == 20) selected @endif >20</option>
												<option value="25" @if($items == 25) selected @endif >25</option>
											</select>
										</form>
									</div>

									<div class="dropdown w-200">
										<select id="tinhID" style="width: 100%" onchange='search_tinhthanh()'>
											<option value=""></option>
											@foreach($province as $value)
												<option value="{{ $value->tentinhthanh }}">{{ $value->tentinhthanh }}</option>
											@endforeach
										</select>
									</div>

									<div class="dropdown w-200">
										<select id="quanID" style="width: 100%" onchange='search_quanhuyen()'>
											<option value=""></option>
											@foreach($district as $value)
												<option value="{{ $value->tenquanhuyen }}">{{ $value->tenquanhuyen }}</option>
											@endforeach
										</select>
									</div>

									<div class="dropdown w-200">
										<select id="xaID" style="width: 100%" onchange='search_phuongxa()'>
											<option value=""></option>
											@foreach($ward as $value)
												<option value="{{ $value->tenphuongxa }}">{{ $value->tenphuongxa }}</option>
											@endforeach
										</select>
									</div>
									
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" onkeyup="search_phone()" name="search_phone" id="search_phone" placeholder="Tìm kiếm số điện thoại">
									</div>
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" onkeyup="search_madaily()" name="search_madaily" id="search_madaily" placeholder="Tìm kiếm mã đại lý">
									</div>
									<div class="dropdown w-200"> 
										<input type="search" style="height: 36px;" class="form-control form-control-sm" onkeyup="search_captren()" name="search_captren" id="search_captren" placeholder="Tìm kiếm mã đại lý cấp trên">
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
											<tr class="content">
												<td>{{$value->id}}</td>
												<td>{{$value->code_user}}</td>
												<td>{{$value->name}}</td>
												<td>0{{$value->phone}}</td>
												<td>{{DB::table('ward')->where('maphuongxa', $value->id_ward)
													->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
												<td>{{DB::table('district')->where('maquanhuyen', $value->id_district)
													->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</td>
												<td>{{DB::table('province')->where('matinhthanh', $value->id_province)
													->select('tentinhthanh')->first()->tentinhthanh ?? ''}}</td>
												<td>{{($value->id_dad->name_dad->code_user)}}</td>
												<td><a href="{{route('listcanhan')}}/{{$value->id}}" class="form-control btn btn-primary" style="background-color: #11101d;">Xem</a></td>
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
				<div class="pt-2 text-end">
					{{$user->appends(compact('items'))->links()}}
				</div>
			</div>
		</div>

	  
<script type="text/javascript" src="{{asset('public/admin/table/table.js')}}"></script>
<script>
    document.getElementById('pagination').onchange = function() { 
        window.location = "{!! $user->url(1) !!}&items=" + this.value; 
    }; 
</script>
@endsection