@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">
<link rel="stylesheet" href="{{ asset('/public/user/css/detailcanhan.css') }}">

<section class="home-section">
<section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">{{$user->name}}</h3>
                            <h6 class="theme-color lead text-uppercase">Mã số: {{$user->code_user}} _ Cấp độ: {{$user->level}}</h6>
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
        </section>  



<div class="row pt-3">
    <div class="col-12 pb-3">
        <h3 class="text-center text-uppercase">Thông tin bán hàng</h3>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng doanh số hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Doanh số cá nhân hiện tại: 50.000.000 VND</p>
            <p class="m-0 text-white">Doanh số đội nhóm hiện tại: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng chiết khấu hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Chiết khấu cá nhân: 50.000.000 VND</p>
            <p class="m-0 text-white">Chiết khấu từ đội nhóm: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng điểm NAO hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Điểm NAO cá nhân hiện tại: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO đội nhóm hiện tại: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Số lượng F1: 100</h4>
            <p class="m-0 text-white">Số lượng thành viên đội nhóm: 50</p>
            <p class="m-0 text-white">(Cập nhật thêm)</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <p class="m-0 text-white">Điểm NAO của nhánh tách 1: 100.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách 2: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách 3: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách N: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-12 text-center">
        <a class="btn btn-warning" style="width: 150px" href="{{route('listcanhan')}}">Quay lại</a>
    </div>
</div>
</section>
@endsection