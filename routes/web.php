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
    return view('public.index');
})->name('home');
Route::get('chuyen-khoan', function () {
    return view('public.payment');
})->name('payment');
Route::get('dang-nhap', function () {
    return view('public.user.login');
})->name('login');
Route::get('dang-nhap-otp', function () {
    return view('public.user.login-otp');
})->name('login.otp');
Route::get('dang-ky', function () {
    return view('public.user.register');
})->name('register');
Route::get('otp', function () {
    return view('public.user.otp');
})->name('otp');
Route::get('quen-mat-khau', function () {
    return view('public.user.forget-password');
})->name('forget.password');
Route::get('dang-ky-thanh-cong', function () {
    return view('public.user.register-success');
})->name('register.success');
Route::get('thong-bao', function () {
    return view('public.notify');
})->name('notify');
Route::get('khuyen-mai', function () {
    return view('public.sale');
})->name('sale');
Route::get('chi-tiet-khuyen-mai', function () {
    return view('public.sale-detail');
})->name('sale.detail');


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

Route::get('/san-pham/dai-ly', function() {
    return view('public.product.index_dai_ly');
});

Route::get('/san-pham/ctv', function() {
    return view('public.product.index_ctv');
});

Route::get('/san-pham/chi-tiet-san-pham', function() {
    return view('public.product.product_detail');
});

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
