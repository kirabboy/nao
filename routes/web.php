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
