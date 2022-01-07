@include('admin.layouts.header')

<x-admin-alert />

@include('admin.layouts.sidebar')

@yield('content')

@include('admin.layouts.footer')