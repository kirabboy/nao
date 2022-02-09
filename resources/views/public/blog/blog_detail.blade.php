@extends('public.layout.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/news.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/navigation.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/filter.css') }}" />
    <style>
        .search {
            position: relative;
        }

    </style>
@endpush
@section('content')
    <div class="container">
        <a href="{{ route('danh-muc-bai-viet.show', $blog_category->slug) }}" class="navigation d-flex align-items-center">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <h3>{{ $blog_category->name }}</h3>
        </a>
    </div>
    <section class="news notify">
        <div class="container">
            <div class="blog-title">
                <h3>{{$blog->name}}</h3>
            </div>
            <div class="blog-content">
                {!! $blog->content !!}
            </div>
        </div>

    </section>
@endsection
