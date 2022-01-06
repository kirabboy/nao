<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap-4.6.1/css/bootstrap.min.css') }}" >
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/menu-fix.css') }}">
    <script src="{{ asset('public/assets/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/bootstrap-4.6.1/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/css/minhstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/header.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    <title>@yield('title')</title>
    @stack('css')
</head>

<body>
    <header id="header" class="background-primary">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="nav-account-text" href="{{asset('profile')}}">
                    <ul>
                        <li><span>Xin chào,</span></li>
                        <li><b>Kira</b></li>
                    </ul>
                </a>
                <div class="nav-tool">
                    <ul>
                        <li>
                            <a href=""><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="far fa-bell"></i></a>
                        </li>
                        <li>
                            <a href="{{url('profile')}}"><i class="far fa-user"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="search search-top">
                <div class="input-group mb-3 search-input">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i>

                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

    </header>
    <main>
