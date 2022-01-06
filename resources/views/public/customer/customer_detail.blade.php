@extends('public.layout.master')
@section('title', 'Chi tiết khách hàng')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/customer.css') }}">
@endpush
@section('content')
    <header id="header-page">
        <div class="container cart-content">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="{{url('/')}}">
                    <i class="fas fa-chevron-left"></i>
                    Chi tiết khách hàng
                </a>
            </nav>
        </div>
    </header>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <nav class="tabbable">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail"
                                role="tab" aria-controls="nav-detail" aria-selected="true">Chi tiết khách hàng</a>
                            <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                                aria-controls="nav-info" aria-selected="false">Thông tin liên hệ</a>
                            <a class="nav-item nav-link" id="nav-addess-tab" data-toggle="tab" href="#nav-addess" role="tab"
                                aria-controls="nav-addess" aria-selected="false">Địa chỉ khách hàng</a>
                            <a class="nav-item nav-link" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab"
                                aria-controls="nav-order" aria-selected="true">Lịch sử mua hàng</a>
                            <a class="nav-item nav-link" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule"
                                role="tab" aria-controls="nav-schedule" aria-selected="false">Lịch hẹn</a>
                            <a class="nav-item nav-link" id="nav-note-tab" data-toggle="tab" href="#nav-note" role="tab"
                                aria-controls="nav-note" aria-selected="false">Ghi chú</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="tab-content pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                            aria-labelledby="nav-detail-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="customer-detail-box">
                                        <ul>
                                            <li><img class="icon-customer"
                                                    src="{{ asset('/public/images/crown-two.png') }}" alt="">Nguyễn Chính
                                                Kira</li>
                                            <li class="line-detail"><span>Mã khách hàng</span><span>MXOH244</span></li>
                                            <li class="line-detail"><span>Nhân viên tư vấn</span><span>12:34
                                                    23/11/2121</span></li>
                                            <li class="line-detail"><span>Tình trạng khách hàng</span><span
                                                    class="btn-drop-down">Đặt hàng<i class="fas fa-caret-down"></i>
                                                </span></li>
                                            <li class="line-detail"><span>Doanh thu</span><span>0 đ</span></li>
                                            <li class="line-detail"><span>Nguồn</span><span
                                                    class="btn-drop-down">Offline<i class="fas fa-caret-down"></i></span>
                                            </li>
                                            <li class="line-detail"><span>Gắn thẻ</span><span class="btn-drop-down">Đã
                                                    chốt hóa đơn<i class="fas fa-caret-down"></i></span></li>
                                        </ul>
                                    </div>
                                    <div class="detail-action">
                                        <ul>
                                            <li><a href="#"><img class="icon-customer"
                                                        src="{{ asset('/public/images/Frame 2411.png') }}" alt="">Tạo lịch
                                                    hẹn</a></li>
                                            <li><a href="tel:"><img class="icon-customer"
                                                        src="{{ asset('/public/images/Frame 2412.png') }}" alt="">Gọi
                                                    điện</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="" class="form-info-customer">
                                <div class="form-group">
                                    <label for="fullname">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Họ và tên"
                                        value="Nguyễn Chính Kira">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" class="form-control" id="birthday" placeholder="Ngày sinh"
                                        value="08-06-1998">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Giới tính</label>
                                    <select type="text" class="form-control" id="sex">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email"
                                        value="Caohocvien@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phonenumber" placeholder="Số điện thoại"
                                        value="0392763984">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook"
                                        value="Http://facebook/caohocvan">
                                </div>
                                <div class="form-group">
                                    <label for="nvkd">NVKD</label>
                                    <input type="text" class="form-control" id="nvkd" placeholder="NVKD"
                                        value="038764574">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-submit background-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-addess" role="tabpanel" aria-labelledby="nav-addess-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="customer-address-box">
                                        <ul>
                                            <li>
                                                <span>Cao học viên <span class="default-address">(Mặc định)</span>
                                                </span><span class="address-action"><img
                                                        src="{{ asset('/public/images/edit.png') }}" alt=""><img
                                                        src="{{ asset('/public/images/delete.png') }}" alt=""></span>
                                            </li>
                                            <li><span>28 đường số 2, thường 7, Vò Gấp</span></li>
                                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="customer-address-box">
                                        <ul>
                                            <li>
                                                <span>Cao học viên
                                                </span><span class="address-action"><img
                                                        src="{{ asset('/public/images/edit.png') }}" alt=""><img
                                                        src="{{ asset('/public/images/delete.png') }}" alt=""></span>
                                            </li>
                                            <li><span>28 đường số 2, thường 7, Vò Gấp</span></li>
                                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="customer-address-box">
                                        <ul>
                                            <li>
                                                <span>Cao học viên
                                                </span><span class="address-action"><img
                                                        src="{{ asset('/public/images/edit.png') }}" alt=""><img
                                                        src="{{ asset('/public/images/delete.png') }}" alt=""></span>
                                            </li>
                                            <li><span>28 đường số 2, thường 7, Vò Gấp</span></li>
                                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="customer-address-box">
                                        <ul>
                                            <li>
                                                <span>Cao học viên
                                                </span><span class="address-action"><img
                                                        src="{{ asset('/public/images/edit.png') }}" alt=""><img
                                                        src="{{ asset('/public/images/delete.png') }}" alt=""></span>
                                            </li>
                                            <li><span>28 đường số 2, thường 7, Vò Gấp</span></li>
                                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="address-add-box">
                                        <a href="{{ url('/them-dia-chi-khach-hang') }}" class="button-ounline"><i
                                                class="fas fa-plus-circle"></i>Thêm địa chỉ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <a href="{{ url('/chi-tiet-don-hang') }}">
                                        <div class="customer-order-box">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                                    <img class="w-100"
                                                        src="{{ asset('/public/images/Rectangle 1156.png') }}" alt="">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                                    <ul>
                                                        <li>
                                                            <span>Mã đơn hàng</span><span
                                                                class="txt-primary">NAO8796</span>
                                                        </li>
                                                        <li>
                                                            <span>Ngày tạo đơn</span><span
                                                                class="txt-primary">06/12/2021</span>
                                                        </li>
                                                        <li>
                                                            <span>Tổng tiền</span><span
                                                                class="txt-primary">1.000.000đ</span>
                                                        </li>
                                                        <li>
                                                            <span>Điểm NAO</span><span class="txt-primary">500</span>
                                                        </li>
                                                        <li>
                                                            <span>Trạng thái</span><span class="txt-success">Chờ xác
                                                                nhận</span>
                                                        </li>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-order-box">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                                <img class="w-100"
                                                    src="{{ asset('/public/images/Rectangle 1156.png') }}" alt="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                                <ul>
                                                    <li>
                                                        <span>Mã đơn hàng</span><span class="txt-primary">NAO8796</span>
                                                    </li>
                                                    <li>
                                                        <span>Ngày tạo đơn</span><span
                                                            class="txt-primary">06/12/2021</span>
                                                    </li>
                                                    <li>
                                                        <span>Tổng tiền</span><span class="txt-primary">1.000.000đ</span>
                                                    </li>
                                                    <li>
                                                        <span>Điểm NAO</span><span class="txt-primary">500</span>
                                                    </li>
                                                    <li>
                                                        <span>Trạng thái</span><span class="txt-success">Chờ xác
                                                            nhận</span>
                                                    </li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-order-box">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                                <img class="w-100"
                                                    src="{{ asset('/public/images/Rectangle 1156.png') }}" alt="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                                <ul>
                                                    <li>
                                                        <span>Mã đơn hàng</span><span class="txt-primary">NAO8796</span>
                                                    </li>
                                                    <li>
                                                        <span>Ngày tạo đơn</span><span
                                                            class="txt-primary">06/12/2021</span>
                                                    </li>
                                                    <li>
                                                        <span>Tổng tiền</span><span
                                                            class="txt-primary">1.000.000đ</span>
                                                    </li>
                                                    <li>
                                                        <span>Điểm NAO</span><span class="txt-primary">500</span>
                                                    </li>
                                                    <li>
                                                        <span>Trạng thái</span><span class="txt-success">Chờ xác
                                                            nhận</span>
                                                    </li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-order-box">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-3 col-3">
                                                <img class="w-100"
                                                    src="{{ asset('/public/images/Rectangle 1156.png') }}" alt="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-9 col-9">
                                                <ul>
                                                    <li>
                                                        <span>Mã đơn hàng</span><span class="txt-primary">NAO8796</span>
                                                    </li>
                                                    <li>
                                                        <span>Ngày tạo đơn</span><span
                                                            class="txt-primary">06/12/2021</span>
                                                    </li>
                                                    <li>
                                                        <span>Tổng tiền</span><span
                                                            class="txt-primary">1.000.000đ</span>
                                                    </li>
                                                    <li>
                                                        <span>Điểm NAO</span><span class="txt-primary">500</span>
                                                    </li>
                                                    <li>
                                                        <span>Trạng thái</span><span class="txt-success">Chờ xác
                                                            nhận</span>
                                                    </li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-schedule-box">
                                        <ul>
                                            <li>
                                                <span>Thời gian</span>
                                                <span> 12:00 06/12/2021</span>
                                            </li>
                                            <li>
                                                <span>Trạng thái</span>
                                                <span class="txt-primary">Chưa xử lý</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-schedule-box">
                                        <ul>
                                            <li>
                                                <span>Thời gian</span>
                                                <span> 12:00 06/12/2021</span>
                                            </li>
                                            <li>
                                                <span>Trạng thái</span>
                                                <span class="txt-primary">Chưa xử lý</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="customer-schedule-box">
                                        <ul>
                                            <li>
                                                <span>Thời gian</span>
                                                <span> 12:00 06/12/2021</span>
                                            </li>
                                            <li>
                                                <span>Trạng thái</span>
                                                <span class="txt-success">Đã xử lý</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="schedule-add-box">
                                        <a href="" class="button-ounline"><i class="fas fa-plus-circle"></i>Thêm lịch hẹn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-note" role="tabpanel" aria-labelledby="nav-note-tab">
                            <form action="" class="form-customer-note">
                                <div class="form-group">
                                    <label for="note">Ghi chú</label>
                                    <textarea class="form-control rounded-1" id="note" rows="10">Khách hàng</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
