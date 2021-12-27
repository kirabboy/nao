@extends('public.layout.master')
@section('title', 'Tất cả sản phẩm')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/shop.css') }}">
@endpush
@section('content')
    <div id="main">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 10; $i++)
                   @include('public.product.shop.include.product_grid_agent')
                @endfor
            </div>
        </div>
    </div>
@endsection
