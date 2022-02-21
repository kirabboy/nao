@extends('public.layout.master')
@section('title', 'Chi tiết khách hàng')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/customer.css') }}">
@endpush
@section('content')
    <header id="header-page">
        <div class="container cart-content">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="{{url('/customer')}}">
                    <i class="fas fa-chevron-left"></i>
                    Khách hàng {{$customer->name}}
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
                                                    src="{{ asset('/public/images/crown-two.png') }}" alt="">
                                                    {{$customer->name}}
                                            </li>
                                            <li class="line-detail"><span>Mã khách hàng</span><span>{{$customer->code_customer}}</span></li>
                                            <li class="line-detail"><span>Nhân viên tư vấn</span><span>
                                                {{$user->name}}</span>
                                            </li>
                                            <!-- <li class="line-detail"><span>Tình trạng khách hàng</span><span
                                                    class="btn-drop-down">Đặt hàng<i class="fas fa-caret-down"></i>
                                                </span></li> -->
                                            <li class="line-detail"><span>Doanh thu</span>
                                                <span>{{ $customer->doanhthu }} đ</span>
                                            </li>

                                            <li class="line-detail"><span>Nguồn</span><span
                                                    class="btn-drop-down">Offline</span>
                                            </li>
                                            <!-- <li class="line-detail"><span>Gắn thẻ</span><span class="btn-drop-down">Đã
                                                    chốt hóa đơn<i class="fas fa-caret-down"></i></span></li> -->
                                            <li class="line-detail"><span>Ngày gia nhập</span><span>{{ $customer->created_at }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="detail-action">
                                        <ul>
                                            <li><a href="#"><img class="icon-customer"
                                                        src="{{ asset('/public/images/Frame 2411.png') }}" alt="">Tạo lịch
                                                    hẹn</a></li>
                                            <li><a href="tel:{{$customer->phone}}"><img class="icon-customer"
                                                        src="{{ asset('/public/images/Frame 2412.png') }}" alt="">Gọi
                                                    điện</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="{{route('detailCustomer',$customer->id)}}" method="POST" class="form-info-customer">
                                <div class="form-group">
                                    <label for="fullname">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Họ và tên"
                                        name="name" value="{{$customer->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" class="form-control" id="birthday" placeholder="Ngày sinh"
                                        name="birthday" value="{{$customer->birthday}}">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Giới tính</label>
                                    <select type="text" name="sex" class="form-control" id="sex">
                                        @if ($customer->sex == 1)
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        @else
                                            <option value="2">Nữ</option>     
                                            <option value="1">Nam</option>                      
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                        value="{{$customer->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="phonenumber" placeholder="Số điện thoại"
                                    @if ($customer->phone != null)   
                                        value="0{{$customer->phone}}"
                                    @else 
                                    
                                    @endif >
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook"
                                        value="{{$customer->facebook}}">
                                </div>
                                <div class="form-group">
                                    <label for="nvkd">NVKD</label>
                                    <input type="text" class="form-control" id="nvkd" placeholder="NVKD"
                                        value="+84{{$user->phone}}" readonly>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-submit background-primary">Lưu</button>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="nav-addess" role="tabpanel" aria-labelledby="nav-addess-tab">
                            <div class="row">
                                @foreach ($address as $diachi)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="customer-address-box">
                                        <ul>
                                            <li>
                                                <span>Cao học viên </span>
                                                <span class="address-action">
                                                    <a href="{{url('/customer')}}/{{$customer->id}}/diachi/{{$diachi->id}}">
                                                        <img src="{{ asset('/public/images/edit.png') }}" alt="">
                                                    </a>    
                                                    <a href="{{url('/customer')}}/{{$customer->id}}/diachi/{{$diachi->id}}/xoa">
                                                        <img src="{{ asset('/public/images/delete.png') }}" alt="">
                                                    </a>
                                                </span>
                                            </li>
                                            <li><span>{{$diachi->address}}</span></li>
                                            <li><span>Đường số 2, Phường 7, Quận Vò Gấp, Tp Hồ ...</span></li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="address-add-box">
                                        <a href="{{asset('/customer')}}/{{$customer->id}}/themdiachi" class="button-ounline"><i
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
                            
                                <div class="form-group">
                                    <label for="note">Ghi chú</label>
                                    <textarea type="text" name="note" class="form-control mb-2 rounded-1" id="note" rows="10">{{$customer->note}}</textarea>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn-submit background-primary">Lưu</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
