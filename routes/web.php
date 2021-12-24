<?php

use Illuminate\Support\Facades\Route;
use App\Http\Admin\LoginController;
use App\Http\Controllers\HomeController; 


Route::get('admin/login', [LoginController::class, 'index']);
Route::prefix('profile')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/info', [HomeController::class, 'infoDetail']);
    Route::get('/resetPassword', [HomeController::class, 'resetPassword']);
    Route::get('/thanhtoan', [HomeController::class, 'thanhtoan']);

    Route::get('/doinhom', [HomeController::class, 'doinhom']);
    Route::get('/chitietthanhvien', [HomeController::class, 'chitietthanhvien']);
    
    Route::get('/chiphi', [HomeController::class, 'chiphi']);
    Route::get('/diemNAOnhanhtach', [HomeController::class, 'diemNAOnhanhtach']);
    Route::get('/tongNAOtrongthang', [HomeController::class, 'tongNAOtrongthang']);
    Route::get('/hoahong', [HomeController::class, 'hoahong']);
    Route::get('/hoahongbanle', [HomeController::class, 'hoahongbanle']);
    Route::get('/hoahongnhom', [HomeController::class, 'hoahongnhom']);

});