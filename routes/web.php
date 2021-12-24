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


Route::get('/danh-sach-san-pham-dai-ly', function () {
    return view('public.product.shop.shop_agent');
});
Route::get('/danh-sach-san-pham-ctv', function () {
    return view('public.product.shop.shop_collab');
});

Route::get('/chi-tiet-san-pham-ctv', function () {
    return view('public.product.detail.product_detail_collab');
});

Route::get('/chi-tiet-san-pham-dai-ly', function () {
    return view('public.product.detail.product_detail_agent');
});

Route::get('/gio-hang', function () {
    return view('public.cart.cart_index');
});

Route::get('/chi-tiet-khach-hang', function () {
    return view('public.customer.customer_detail');
});

Route::get('/them-dia-chi-khach-hang', function () {
    return view('public.customer.add_address');
});
Route::get('/chi-tiet-don-hang', function () {
    return view('public.customer.tracking_order');
});
Route::get('/thong-tin-van-chuyen', function () {
    return view('public.customer.tracking_order_shipping');
});