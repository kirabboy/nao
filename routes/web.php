<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
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
    return view('public.index');
});
Route::get('chuyen-khoan', function () {
    return view('public.payment');
});
Route::get('dang-nhap', function () {
    return view('public.user.login');
});
Route::get('dang-nhap-otp', function () {
    return view('public.user.login-otp');
});
Route::get('dang-ky', function () {
    return view('public.user.register');
});
Route::get('otp', function () {
    return view('public.user.otp');
});
Route::get('quen-mat-khau', function () {
    return view('public.user.forget-password');
});
Route::get('dang-ky-thanh-cong', function () {
    return view('public.user.register-success');
});
Route::get('thong-bao', function () {
    return view('public.notify');
});
Route::get('khuyen-mai', function () {
    return view('public.sale');
});
Route::get('chi-tiet-khuyen-mai', function () {
    return view('public.sale-detail');
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

// MINH START

Route::get('/san-pham/dai-ly', [ProductController::class, 'index_daily'])->name('product_daily');
Route::get('/san-pham/ctv', [ProductController::class, 'index_ctv'])->name('product_ctv');
Route::get('/san-pham/dai-ly/{slug}', [ProductController::class, 'detail_daily'])->name('product_detail_daily');
Route::get('/san-pham/ctv/{slug}', [ProductController::class, 'detail_ctv'])->name('product_detail_ctv');

Route::get('/gio-hang', function() {
    return view('public.checkout.cart');
});

Route::get('/checkout', function() {
    return view('public.checkout.checkout');
});

Route::get('/checkout/nhap-thong-tin', function() {
    return view('public.checkout.customer_form_info');
});

Route::get('/thanh-toan', function() {
    return view('public.checkout.payment');
});

Route::get('/don-hang', function() {
    return view('public.order.index');
});

Route::get('/don-hang/chi-tiet', function() {
    return view('public.order.detail');
});

Route::get('/don-hang/thong-tin-van-chuyen', function() {
    return view('public.order.shipping_detail');
});

Route::get('/quan-ly-khach-hang', function() {
    return view('public.order.index_customer');
});

// END MINH
