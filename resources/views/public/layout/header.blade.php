<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    <title>@yield('title')</title>

    @stack('css')

</head>

<body>
    <header id="header" class="background-primary">
        <div class="container">

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
                            <a href=""><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="far fa-bell"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="far fa-user"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="search-top">
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
