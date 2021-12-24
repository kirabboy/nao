<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.layout.header');
});

Route::get('/san-pham/dai-ly', function() {
    return view('public.product.index_dai_ly');
});

Route::get('/san-pham/ctv', function() {
    return view('public.product.index_ctv');
});

Route::get('/chi-tiet-san-pham', function() {
    return view('public.product.product_detail');
});

Route::get('/gio-hang', function() {
    return view('public.checkout.cart');
});

Route::get('/checkout', function() {
    return view('public.checkout.checkout');
});

Route::get('/nhap-thong-tin', function() {
    return view('public.checkout.customer_form_info');
});

Route::get('/thanh-toan', function() {
    return view('public.checkout.payment');
});