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
							<h4 class="mb-0 me-4 text-uppercase fs-5 text-center">
                                Thông tin chuyển khoản {{$user->code_user}} _ 
                                @if ($user->level == 1)
                                    Cộng tác viên
                                @elseif ($user->level == 2)
                                    Đại lý chuẩn 
                                @elseif ($user->level == 3)
                                    Đại lý tạm thời
                                @endif
                            </h4>
						</div>
					</div>
				</div>
				<hr>
				<!-- filter -->
                <div class="row pb-5">
                @if($user->level == 1)
                    <!-- <div class="col-6 text-center">
                        <a href="{{route('nangcap_ctv',$user->id)}}" class="btn btn-warning" style="width: 50%">
                            Nâng cấp lên đại lý chuẩn</a>
                    </div> -->
                    <div class="col-12 text-center">
                        <a href="{{route('dailytamthoi',$user->id)}}" class="btn btn-danger" style="width: 50%">
                            Nâng cấp lên đại lý tạm thời</a>
                    </div>
                @elseif ($user->level == 2)
                    <div class="col-12 text-center">
                        <a class="btn btn-danger" style="width: 50%">
                            Hiện đã là đại lý</a>
                    </div>
                @elseif ($user->level == 0)
                    <div class="col-12 text-center">
                        <a href="{{route('nangcap_ctv',$user->id)}}" class="btn btn-danger" style="width: 50%">
                            Nâng cấp lên cộng tác viên</a>
                    </div>
                @elseif ($user->level == 3)
                    <div class="col-12 text-center">
                        <a class="btn btn-danger" style="width: 50%">
                            Hiện đã là đại lý tạm thời. Ngày hết hạn {{$user->ngayhethan}}</a>
                    </div>
                @endif
                </div>

                @if($user->getNangcap->where('status','=',0)->count() > 0)
                <div class="row pb-5">
                    <h2 class="text-center text-uppercase">Ảnh chuyển khoản đang chờ duyệt</h2>
                    @foreach ($user->getNangcap as $value)
                        @if ($value->status == 0)
                        <div class="col-6">
                            <img src="{{asset('user/nangcap')}}/{{$value->image}}" width="100%">
                        </div>
                        <div class="col-6">
                            Trạng thái: Chưa duyệt
                            <br>
                            Thời gian nhận tin: {{$value->created_at}}
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif
                
                @if($user->getNangcap->where('status','=',1)->count() > 0)
                <div class="row">
                    <h2 class="text-center text-uppercase">Lịch sử nâng cấp</h2>
                    @foreach ($user->getNangcap as $value)
                        @if ($value->status == 1)
                        <div class="col-6">
                            <img src="{{asset('user/nangcap')}}/{{$value->image}}" width="100%">
                        </div>
                        <div class="col-6">
                            Trạng thái: Đã duyệt
                            <br>
                            Thời điểm được duyệt: {{$value->updated_at}}
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif
				<!-- end filter -->
			</div>
		</div>
  	</section>
<script type="text/javascript" src="{{asset('public/admin/table/table.js')}}"></script>
@endsection