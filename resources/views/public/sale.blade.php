@extends('public.layout.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/news.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/navigation.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/filter.css') }}" />
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
        <h3>Khuyến mãi</h3>
    </a>
    <div class="search mb-2 mt-2">
        <div class="input-group search-input">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i>

                </span>
            </div>
            <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Username"
                aria-describedby="basic-addon1">
        </div>
    </div>
</div>
<section class="filter mt-30 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-6">
                <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-6 mt-15">
                <select class="form-control custom-input">
                    <option selected="selected" value="">Đang diễn ra</option>
                </select>
            </div>
        </div>    
    </div>
</section>
<section class="news notify">
    <div class="container">
        <div class="row">
            <div class="col">
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
                                <div class="status">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span>Đang diễn ra</span>
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
                                <div class="status">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span>Đang diễn ra</span>
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
                                <div class="status">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span>Đang diễn ra</span>
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
                                <div class="status">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span>Đang diễn ra</span>
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
