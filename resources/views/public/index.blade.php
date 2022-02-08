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
                        <a href="{{ URL::to('/hoahong') }}" class="d-flex flex-column align-items-center items">
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
                        @foreach ($blog_categories as $blog_category)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                    href="#{{ $blog_category->slug }}">{{ $blog_category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="lasted" class="tab-pane active">
                            <div class="d-flex flex-column blog-grid-item">
                                @foreach ($new_blogs as $blog)
                                    @include('public.blog.blog_item_grid', ['blog'=>$blog])
                                @endforeach
                            </div>
                        </div>
                        @foreach ($blog_categories as $blog_category)
                            <div id="{{ $blog_category->slug }}" class=" tab-pane fade">
                                <div class="d-flex flex-column blog-grid-item">
                                    @foreach ($blog_category->blogs()->paginate(5) as $blog)
                                        @include('public.blog.blog_item_grid', ['blog'=>$blog])
                                    @endforeach
                                </div>
                                <div class="blog-readmore">
                                    <a class="btn btn-primary btn-rounded" href="{{route('danh-muc-bai-viet.show',$blog_category->slug)}}">Xem thêm</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
