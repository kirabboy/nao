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
							<h4 class="mb-0 me-4 text-uppercase fs-5 text-center">Nâng cấp đại lý</h4>
						</div>
					</div>
				</div>
				<hr>
				<!-- filter -->
				<div class="filter__address">
					<div class="team__filter">
						<div class="row">
							<div class="team__filter-left col-lg-12 p-0">
<!----------------- Table information user ----------------->
								<div class="pt-2">
									<table class="styled-table table-sortable" id="myTable" style="width: 100%;">
										<thead>
											<tr>
												<th>Mã đại lý</th>
												<th>Họ tên</th>
												<th>Số điện thoại</th>
												<th>Cấp độ</th>
                                                <th>Thông tin chuyển khoản</th>
                                                <th>Trạng thái</th>
												<th>Chi tiết</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($user as $value)
											<tr>
												<td>{{$value->code_user}}</td>
												<td>{{$value->name}}</td>
												<td>0{{$value->phone}}</td>
												<td>
                                                    @if ($value->level == 1)
                                                        Cộng tác viên
                                                    @elseif ($value->level == 2)
                                                        Đại lý
                                                    @elseif ($value->level == 3)
                                                        Đại lý tạm thời
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($value->getNangcap->where('status','=',0)->count() > 0)
                                                    @foreach ($value->getNangcap as $upgrade)
                                                        <img src="{{asset('user/nangcap')}}/{{$upgrade->image}}" width="150px">
                                                        <br>
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($value->getNangcap->where('status','=',0)->count() > 1)
                                                        <a class="btn btn-warning">Đã chuyển khoản</a>
                                                    @else 
                                                        <a class="btn btn-primary">Bình thường</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-dark" href="{{route('detailNangcap',$value->id)}}">
                                                        Xem
                                                    </a>
                                                </td>
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