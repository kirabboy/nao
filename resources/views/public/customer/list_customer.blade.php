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
                    Danh sách khách hàng
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
                                role="tab" aria-controls="nav-detail" aria-selected="true">Danh sách khách hàng</a>
                            <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                                aria-controls="nav-info" aria-selected="false">Thêm mới khách hàng</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
{{-- Danh sach khách hàng --}}
                    <div class="tab-content pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                            aria-labelledby="nav-detail-tab">
                            @foreach ($customer as $value)

                            <a href="{{route('detailCustomer',$value->id)}}">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="customer-detail-box">
                                            <ul>
                                                <li><img class="icon-customer"
                                                        src="{{ asset('/public/images/crown-two.png') }}" alt="">
                                                        {{$value->name}}</li>
                                                <li class="line-detail"><span>Mã khách hàng</span><span>{{$value->code_customer}}</li>
                                                <li class="line-detail"><span>Nhân viên tư vấn</span><span>{{$user->name}}</span></li>
                                                <!-- <li class="line-detail"><span>Tình trạng khách hàng</span><span
                                                        class="btn-drop-down">Đặt hàng<i class="fas fa-caret-down"></i>
                                                    </span></li> -->
                                                <li class="line-detail"><span>Doanh thu</span><span>0 đ</span></li>
                                                <li class="line-detail"><span>Nguồn</span><span
                                                        class="btn-drop-down">Offline</span>
                                                </li>
                                                <li class="line-detail">Ngày gia nhập <span>{{$value->created_at}}</span></li>
                                                <!-- <li class="line-detail"><span>Gắn thẻ</span><span class="btn-drop-down">Đã
                                                        chốt hóa đơn<i class="fas fa-caret-down"></i></span></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                
{{-- Create khách hàng --}}
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="{{route('get.listCustomer')}}" method="post" class="form-info-customer">
                                <div class="form-group">
                                    <label for="fullname">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Họ và tên"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" class="form-control" id="birthday" placeholder="Ngày sinh"
                                        name="birthday">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Giới tính</label>
                                    <select type="text" class="form-control" name="sex" id="sex">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phonenumber" placeholder="Số điện thoại"
                                        name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook"
                                        name="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="nvkd">NVKD</label>
                                    <input type="text" class="form-control" id="nvkd" placeholder="NVKD"
                                        value="+84{{$user->phone}}" readonly>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-submit background-primary">Lưu</button>
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
