@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">
<link rel="stylesheet" href="{{ asset('/public/user/css/detailcanhan.css') }}">
<link rel="stylesheet" href="{{ asset('/public/admin/table/table.css') }}" type="text/css">

<!-- Đoạn JS Date Picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#search_madaily" ).datepicker();
	} );
</script>
  	<!-- End Đoạn JS Date Picker -->

<section class="home-section">
    <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">{{$user->name}}</h3>
                            <h6 class="theme-color lead text-uppercase">Mã số: {{$user->code_user}} _ 
                                @if($user->level == 1)
                                    Cộng tác viên
                                @elseif ($user->level == 2)
                                    Đại lý chính thức
                                @elseif ($user->level == 3)
                                    Đại lý tạm thời
                                @endif
                            </h6>
                            <!-- <p>I <mark>design and develop</mark> services for customers 
                            of all sizes, specializing in creating stylish, modern websites,
                             web services and online stores. My passion is to design digital user 
                             experiences through the bold interface and meaningful interactions.</p> -->
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Số điện thoại</label>
                                        <p>+84{{$user->phone}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Số CMND</label>
                                        <p>{{$user->cmnd}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Ngày cấp</label>
                                        <p>{{$user->cmnd_day}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Tên chủ thẻ</label>
                                        <p>{{$user->bank_name}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Số tài khoản</label>
                                        <p>{{$user->bank_number}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Ngân hàng</label>
                                        <p>{{$user->bank}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Chi nhánh</label>
                                        <p>{{$user->bank_chinhanh}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Ngày sinh</label>
                                        <p>{{$user->birthday}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Tuổi</label>
                                        <p>{{$user_age}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Giới tính</label>
                                        <p> @if($user->sex == 1)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </p>
                                    </div>
                                    <div class="media">
                                        <label>Địa chỉ</label>
                                        <p>{{$user->address}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Phường xã</label>
                                        <p>{{DB::table('ward')->where('maphuongxa', $user->id_ward)
											->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Quận huyện</label>
                                        <p>{{DB::table('district')->where('maquanhuyen', $user->id_district)
											->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Tỉnh thành</label>
                                        <p>{{DB::table('province')->where('matinhthanh', $user->id_province)
											->select('tentinhthanh')->first()->tentinhthanh ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="{{asset('/user/image/avatar.png')}}" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">{{$count_child}}</h6>
                                <p class="m-0px font-w-600">Cấp dưới</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">{{$count_customer}}</h6>
                                <p class="m-0px font-w-600">Khách hàng</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">0</h6>
                                <p class="m-0px font-w-600">Đơn hoàn thành</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">0</h6>
                                <p class="m-0px font-w-600">Điểm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row pt-3 justify-content-center">
            <div class="col-12 pb-2">
                <h3 class="text-center text-uppercase">Lịch sử bán hàng</h3>
            </div>
            <div class="col-4 pb-2" >
                <input class="form-control" type="text" id="search_madaily" onkeyup="search_madaily()" name="search_madaily" placeholder="Nhập thời gian tìm kiếm">
            </div>
            <div class="col-11">
                <table class="styled-table table-sortable" id="myTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Số điểm nhận được</th>
                            <th>Số tiền đã chi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history->DoanhThuNgay as $value)
                        <tr>
                            <td>{{$value->created_at->format('m/d/Y')}}</td>
                            <td>{{$value->point}}</td>
                            <td>{{$value->amount}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row pt-3 justify-content-center">
            <div class="col-12 pb-2">
                <h3 class="text-center text-uppercase">Lịch sử bán hàng theo tháng</h3>
            </div>
            <div class="col-11">
                <table class="styled-table table-sortable" id="myTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Point NAO</th>
                            <th>Doanh Thu</th>
                            <th>Nhánh</th>
                            <th>Hoa hồng bán lẻ</th>
                            <th>Hoa hồng nhóm</th>
                            <th>Hoa hồng lãnh đạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history_month->DoanhThuThang as $value)
                        <tr>
                            <td>{{$value->created_at->format('m/Y')}}</td>
                            <td>{{$value->point}}</td>
                            <td>{{$value->amount}}</td>
                            <td>{{$value->nhanh}}</td>
                            <td>{{$value->hoahong_banle}}</td>
                            <td>{{$value->hoahong_nhom}}</td>
                            <td>{{$value->hoahong_lanhdao}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-12 pb-2">
                <h3 class="text-center text-uppercase">Thông tin bán hàng</h3>
            </div>
            <div class="col-6 text-center box-dad">
                <div class="box-child">
                    <h5 class="text-uppercase text-white">Tổng doanh số hiện tại: {{$sumDT_all_nhanh + $tongdiemNAO->PointNAO->doanhthu}} VNĐ</h4>
                    <p class="m-0 text-white">Doanh số cá nhân hiện tại: {{$tongdiemNAO->PointNAO->doanhthu}} VNĐ</p>
                    <p class="m-0 text-white">Doanh số đội nhóm hiện tại: {{$sumDT_all_nhanh}} VNĐ</p>
                </div>
            </div>
            <div class="col-6 text-center box-dad">
                <div class="box-child">
                    <h5 class="text-uppercase text-white">
                        Tổng chiết khấu hiện tại: 
                        @if ($tongdiemNAO->PointNAO->point >= 120000000)
                            12%
                        @elseif ($tongdiemNAO->PointNAO->point >= 60000000 && $tongdiemNAO->PointNAO->point< 120000000)
                            6%
                        @elseif ($tongdiemNAO->PointNAO->point >= 30000000 && $tongdiemNAO->PointNAO->point < 60000000)
                            3%
                        @else
                            0%
                        @endif
                    </h4>
                    <p class="m-0 text-white">Chiết khấu cá nhân: 0%</p>
                    <p class="m-0 text-white">Chiết khấu từ đội nhóm: 0%</p>
                </div>
            </div>
            <div class="col-6 text-center box-dad">
                <div class="box-child">
                    <h5 class="text-uppercase text-white">Tổng điểm NAO hiện tại: {{$sumPoint_all_nhanh + $tongdiemNAO->PointNAO->point}} point</h4>
                    <p class="m-0 text-white">Điểm NAO cá nhân hiện tại: {{$tongdiemNAO->PointNAO->point}} point</p>
                    <p class="m-0 text-white">Điểm NAO đội nhóm hiện tại: {{$sumPoint_all_nhanh}} point</p>
                </div>
            </div>
            <div class="col-6 text-center box-dad">
                <div class="box-child">
                    <h5 class="text-uppercase text-white">Số lượng F1: {{$tong_so_F1}}</h4>
                    <p class="m-0 text-white">Số lượng thành viên đội nhóm: {{count($listGroup)}}</p>
                    <p class="m-0 text-black">_</p>
                </div>
            </div>
            <div class="col-6 text-center box-dad">
                <div class="box-child">
                @if ($listPoint != null)
                    @foreach ($listPoint as $value)
                    <p class="m-0 text-white">Điểm NAO của nhánh tách {{ $value->id }}: {{ $value->point }} Point</p>
                    @endforeach
                @else
                    <p class="m-0 text-white">{{$user->name}} chưa có nhánh tách</p>
                @endif
                </div>
            </div>
            <div class="col-12 text-center">
                <a class="btn btn-warning" style="width: 150px" href="{{route('listcanhan')}}">Quay lại</a>
            </div>
        </div>
    </section>
</section>
@endsection
