@extends('public.layout.master')

@push('css')
<link rel="stylesheet" href="{{ asset('public/css/minh.css') }}">

@endpush
@push('js')
@endpush

@section('content')

    

    <section class="section-payment">
        <div class="payment-success text-center">
            <img src="{{asset('public/images/checked.png')}}" alt="">
            <p>Bạn đã thanh toán thành công</p>
        </div>
    </section>

@endsection
