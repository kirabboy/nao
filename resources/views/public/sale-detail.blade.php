@extends('public.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/news.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/navigation.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/sale-detail.css') }}" />
<style>
    .search{
        position: relative;
    }
</style>
@endpush
@section('content')
<div class="container">
    <a href="javascript:history.back()" class="navigation d-flex align-items-center">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <h3>Mừng sinh nhật NAO...</h3>
    </a>
    <section class="banner">
        <div class="row">
            <div class="col">
                <img class="w-100" src="{{ asset('public/uploads/banner.png') }}" alt="">
            </div>
        </div>
    </section>
</div>
<section class="sale-product mt-15 mb-15">
    <div class="container">
        <h3>MỪNG SINH NHẬT NAO - Mua Combo son kem khoáng cho da ngăm - Tặng hộp 05 chai TOP PERFUME OIL – Nước hoa tinh dầu (1 ml/ chai)</h3>
        <div class="status">
            <i class="fa fa-circle" aria-hidden="true"></i>
            <span>Đang diễn ra</span>
        </div>
    </div>
</section>
<section class="sale-condition">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tutorial">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td>Điều kiện áp dụng</td>
                                <td>MB Banks</td>
                            </tr>
                            <tr>
                                <td>Thời gian áp dụng</td>
                                <td>1015643754</td>
                            </tr>
                            <tr>
                                <td>Đối tượng áp dụng</td>
                                <td>Công ty TNHH MEVIVU</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news mt-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product d-flex align-items-center mb-15">
                    <img src="{{ asset('public/uploads/sale-1.png') }}" alt="">
                    <h3>Các sản phẩm áp dụng khuyến mại</h3>
                </div>
                <div class="d-flex flex-column">
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<section class="news mt-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product d-flex align-items-center mb-15">
                    <img src="{{ asset('public/uploads/frame.png') }}" alt="">
                    <h3>Các sản phẩm tặng kèm</h3>
                </div>
                <div class="d-flex flex-column">
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex shadow align-items-center">
                        <div class="img left">
                            <img src="{{ asset('public/uploads/news-1.png') }}" alt="">
                        </div>
                        <div class="right d-flex flex-column">
                            <p class="title" >Khuyến mãi tri ân khách hàng nhân dịp sinh nhật...</p>
                            <div class="d-flex align-items-center">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ date('d/m/Y - H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection
