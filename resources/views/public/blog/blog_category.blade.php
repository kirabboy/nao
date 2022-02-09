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
        <a href="{{ url('/') }}" class="navigation d-flex align-items-center">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <h3>{{ $blog_category->name }}</h3>
        </a>
    </div>
    <section class="news notify">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-column">
                        <div class="blog-grid-items">
                            @foreach ($blogs as $blog)
                                @include('public.blog.blog_item_grid', ['blog'=>$blog])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
