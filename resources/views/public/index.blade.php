@extends('public.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/news.css') }}" />
@endpush
@section('content')
<div class="container">
    <section class="banner">
        <div class="row">
            <div class="col">
                <img src="{{ asset('public/uploads/banner.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="service">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-around">
                    <a href="{{ URL::to('/doinhom') }}" class="d-flex flex-column align-items-center items">
                        <div class="img">
                            <img src="{{ asset('public/uploads/group.png') }}" alt="">
                        </div>
                        <span class="title">Đội nhóm</span>
                    </a>
                    <a href="{{ URL::to('profile/hoahong') }}" class="d-flex flex-column align-items-center items">
                        <div class="img">
                            <img src="{{ asset('public/uploads/coin.png') }}" alt="">
                        </div>
                        <span class="title">Hoa hồng</span>
                    </a>
                    <a href="{{ route('sale') }}" class="d-flex flex-column align-items-center items">
                        <div class="img">
                            <img src="{{ asset('public/uploads/news.png') }}" alt="">
                        </div>
                        <span class="title">Thông tin</span>
                    </a>
                    <a href="{{ route('sale') }}" class="d-flex flex-column align-items-center items">
                        <div class="img">
                            <img src="{{ asset('public/uploads/sale.png') }}" alt="">
                        </div>
                        <span class="title">Giảm giá</span>
                    </a>
                    <!-- <a class="d-flex flex-column align-items-center items">
                        <div class="img">
                            <img src="{{ asset('public/uploads/help.png') }}" alt="">
                        </div>
                        <span class="title">Hỗ trợ</span>
                    </a> -->
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="row">
            <div class="col">
                <h3>Tin tức hôm nay</h3>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#lasted">Hoạt động gần đây</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#news">Tin tức</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="lasted" class="tab-pane active">
                        <div class="d-flex flex-column">
                            @for($i = 0; $i < 5; $i++)
                            <a href="{{ route('sale.detail') }}" class="content d-flex shadow align-items-center">
                                <div class="img left">
                                    <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                                </div>
                                <div class="right d-flex flex-column">
                                    <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                                    <p class="time">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span>{{ date('d/m/Y - H:i') }}</span>
                                    </p>
                                </div>
                            </a>
                            @endfor
                        </div>
                    </div>
                    <div id="news" class=" tab-pane fade">
                        <div class="d-flex flex-column">
                            @for($i = 0; $i < 5; $i++)
                            <a href="{{ route('sale.detail') }}" class="content d-flex shadow align-items-center">
                                <div class="img left">
                                    <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                                </div>
                                <div class="right d-flex flex-column">
                                    <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                                    <p class="time">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span>{{ date('d/m/Y - H:i') }}</span>
                                    </p>
                                </div>
                            </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection