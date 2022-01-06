@extends('public.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/news.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/navigation.css') }}" />
@endpush
@section('content')
<div class="container">
    <a href="javascript:history.back()" class="navigation d-flex align-items-center">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <h3>Thông báo</h3>
    </a>
</div>
<section class="news notify mt-0">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tab">
                    <ul class="nav nav-tabs flex-nowrap">
                        <li class="nav-item flex-fill">
                            <a class="nav-link active" data-toggle="tab" href="#order">Đơn hàng</a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link" data-toggle="tab" href="#new-product">Sản phẩm mới</a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link" data-toggle="tab" href="#sale">Khuyến mãi</a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link" data-toggle="tab" href="#different">Khác</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="order" class="tab-pane active">
                        <div class="d-flex flex-column">
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                        </div>
                    </div>
                    <div id="news" class=" tab-pane fade">
                        <div class="d-flex flex-column">
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                            <div class="content d-flex shadow align-items-center">
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
                            </div>
                        </div>
                    </div>
                    <div id="sale" class=" tab-pane fade">
                        <div class="content d-flex shadow align-items-center">
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
                        </div>
                    </div>
                    <div id="different" class=" tab-pane fade">
                        <div class="content d-flex shadow align-items-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection
