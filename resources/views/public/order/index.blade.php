@extends('public.layout.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/filter.css') }}">
@endpush

@section('content')
    <section class="filter mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-6">
                    <input type="date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
                </div>
            </div>    
        </div>
    </section>

    <section class="section-order">
        <div class="order-list">

            {{-- CHỜ XÁC NHẬN (CÓ BUTTON HỦY) --}}
            @foreach($orders as $order)
                @include('public.order.order_grid_item', ['order' =>$order])
            @endforeach
        
        </div>
    </section>

@endsection
