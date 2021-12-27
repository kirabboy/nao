@extends('public.layout.master')
@section('title', 'Giỏ hàng')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/css/cart.css') }}">
@endpush
@push('js')
    <script>
        var minus = document.querySelector("#minus");
        var plus = document.querySelector("#plus");
        var input = document.querySelector("#input");

        var quantity = 1;

        input.value = quantity;

        minus.addEventListener('click', function(event) {
            if (quantity > 1) {
                quantity--;
                input.value = quantity;
            }
        });

        plus.addEventListener('click', function(event) {
            quantity++;
            input.value = quantity;
        });
    </script>
@endpush
@section('content')
    <header id="header-page">
        <div class="container cart-content">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <a class="nav-page-text" href="#">
                    <i class="fas fa-arrow-left"></i>
                    Giỏ hàng
                </a>
            </nav>
        </div>
    </header>
    <div id="main">
        <div class="container-fluid">
            <div class="row list-cart-item">
                @for ($i=0; $i<9;$i++)
                    @include('public.cart.include.cart_item')
                @endfor
            </div>
        </div>
        <div class="product-action">
            <a class="btn btn-pri" href="">Thêm vào giỏ hàng</a>
            <a class="btn btn-pri" href="">Mua ngay</a>
        </div>
    </div>
@endsection
