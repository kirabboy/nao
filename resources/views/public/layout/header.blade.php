<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap-4.6.1/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/menu-fix.css') }}">
    <script src="{{ asset('public/assets/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/bootstrap-4.6.1/js/bootstrap.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    @stack('css')
</head>

<body>
    <header id="header" class="background-primary">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="nav-account-text" href="#">
                <ul>
                    <li><span>Xin chào,</span></li>
                    <li><b>Kira</b></li>
                </ul>
            </a>
            <div class="nav-tool">
                <ul>
                    <li>
                        <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-bell" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="search-top">
            <div class="input-group mb-3 search-input">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i>

                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
        </div>
    </header>
    <main>
