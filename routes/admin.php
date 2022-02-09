<?php

use Illuminate\Support\Facades\Route;

use App\Admin\Controllers\BrandController;
use App\Admin\Controllers\CalculationUnitController;
use App\Admin\Controllers\ProductCategoryController;
use App\Admin\Controllers\ProductController;
use App\Admin\Controllers\WarehouseController;
use App\Admin\Controllers\OrderController;
use App\Admin\Controllers\AdminHomeController;
use App\Admin\Controllers\ConfigShippingController;
use App\Admin\Controllers\LoginController;
use App\Admin\Controllers\BaoCaoController;
use App\Admin\Controllers\QuanLyDaiLyController;
use App\Admin\Controllers\KhuyenMaiController;
use App\Admin\Controllers\SettingController;

Route::get('/login', [LoginController::class, 'index'])->name('get.admin.login');
Route::post('/login', [LoginController::class, 'store'])->name('admin.login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin');
    
    Route::get('loai-khuyen-mai', function () {
        return view('admin.loai-khuyen-mai');
    });
    Route::prefix('don-hang')->group(function () {
        Route::get('don-hang-dai-ly', [OrderController::class, 'getOrderAgency'])->name('orderadmin.agency');
        
        Route::put('/cap-nhat-don-hang', [OrderController::class, 'puthOrderUpdate'])->name('order.update');
        Route::get('/chi-tiet/{order:id}', [OrderController::class, 'getOrderDetail'])->name('order.detail');
        Route::patch('/huy-don-hang', [OrderController::class, 'patchOrderDestroy']);
        Route::delete('/xoa-don-hang', [OrderController::class, 'deleteOrderDelete']);
    });
    
    // ĐƠN VỊ TÍNH
    Route::get('/don-vi-tinh', [CalculationUnitController::class, 'index'])->name('don-vi-tinh.index');
    Route::get('/don-vi-tinh/getDatatable', [CalculationUnitController::class, 'indexDatatable'])->name('don-vi-tinh.indexDatatable');
    Route::get('/don-vi-tinh/modal-edit', [CalculationUnitController::class, 'modalEdit'])->name('don-vi-tinh.modalEdit');
    Route::post('/don-vi-tinh', [CalculationUnitController::class, 'store'])->name('don-vi-tinh.store');
    Route::put('/don-vi-tinh/update', [CalculationUnitController::class, 'update'])->name('don-vi-tinh.update');
    Route::put('/don-vi-tinh', [CalculationUnitController::class, 'updateStatus'])->name('don-vi-tinh.updateStatus');
    Route::delete('/don-vi-tinh', [CalculationUnitController::class, 'destroy'])->name('don-vi-tinh.delete');
    // PRODUCT CATEGORIES
    Route::get('/nganh-nhom-hang', [ProductCategoryController::class, 'index'])->name('nganh-nhom-hang.index');
    Route::post('/nganh-nhom-hang', [ProductCategoryController::class, 'store'])->name('nganh-nhom-hang.store');
    Route::get('/nganh-nhom-hang/modal-edit', [ProductCategoryController::class, 'modalEdit'])->name('nganh-nhom-hang.modalEdit');
    Route::put('/nganh-nhom-hang/update/{id}', [ProductCategoryController::class, 'update'])->name('nganh-nhom-hang.update');
    Route::put('/nganh-nhom-hang/{id}', [ProductCategoryController::class, 'updateStatus'])->name('nganh-nhom-hang.updateStatus');
    Route::delete('/nganh-nhom-hang/{id}', [ProductCategoryController::class, 'destroy'])->name('nganh-nhom-hang.delete');
    Route::get('/nganh-nhom-hang/get-category', [ProductCategoryController::class, 'getCategory'])->name('nganh-nhom-hang.getCategory');

    // PRODUCT
    Route::get('/san-pham', [ProductController::class, 'index'])->name('san-pham.index');
    Route::get('/tao-san-pham', [ProductController::class, 'create'])->name('san-pham.create');
    Route::post('/san-pham', [ProductController::class, 'store'])->name('san-pham.store');
    Route::get('/san-pham/edit/{id}', [ProductController::class, 'edit'])->name('san-pham.edit');
    Route::put('/san-pham/update/{id}', [ProductController::class, 'update'])->name('san-pham.update');
    Route::delete('/san-pham/delete/{id}', [ProductController::class, 'destroy'])->name('san-pham.delete');
    Route::get('/san-pham/get-category', [ProductController::class, 'getCategory'])->name('san-pham.getCategory');

    // BRAND
    Route::get('/thuong-hieu', [BrandController::class, 'index'])->name('thuong-hieu.index');
    Route::get('/thuong-hieu/getDatatable', [BrandController::class, 'indexDatatable'])->name('thuong-hieu.indexDatatable');
    Route::get('/thuong-hieu/modal-edit', [BrandController::class, 'modalEdit'])->name('thuong-hieu.modalEdit');
    Route::post('/thuong-hieu', [BrandController::class, 'store'])->name('thuong-hieu.store');
    Route::put('/thuong-hieu/update', [BrandController::class, 'update'])->name('thuong-hieu.update');
    Route::put('/thuong-hieu', [BrandController::class, 'updateStatus'])->name('thuong-hieu.updateStatus');
    Route::delete('/thuong-hieu', [BrandController::class, 'destroy'])->name('thuong-hieu.delete');

    Route::get('/ton-kho-CNNPP', function () {
        return view('admin.warehouse.ton-kho-CNNPP');
    });

    Route::get('/ton-kho-dai-ly', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::post('/ton-kho-dai-ly', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::put('/ton-kho-dai-ly', [WarehouseController::class, 'update'])->name('warehouse.update');
    Route::delete('/ton-kho-dai-ly', [WarehouseController::class, 'delete'])->name('warehouse.destroy');
    Route::get('thong-tin-ban-hang', function () {
        return view('admin.thong-tin-ban-hang');
    });

    //Bao cao
    Route::prefix('baocao')->group(function () {
        Route::get('/', [BaoCaoController::class, 'index']);
        Route::get('/chitiet', [BaoCaoController::class, 'chitiet']);
    });

    //Quanlydaily
    //Quanlydaily
    Route::prefix('doinhom')->group(function () {
        Route::get('/', [QuanLyDaiLyController::class, 'doinhom'])->name('listdoinhom');
        Route::get('/{id}', [QuanLyDaiLyController::class, 'detailDoiNhom']);
        Route::get('/{id}/download', [QuanLyDaiLyController::class, 'downDanhSach']);
        //dowListDoiNhom
    });
    Route::prefix('canhan')->group(function () { 
        Route::get('/', [QuanLyDaiLyController::class, 'canhan'])->name('listcanhan');
        Route::get('/download', [QuanLyDaiLyController::class, 'dowListUser']);
        Route::get('/{id}', [QuanLyDaiLyController::class, 'chitietcanhan']);
    });

    //KhuyenMai 
    Route::get('/khuyenmai', [KhuyenMaiController::class, 'loaikhuyenmai']);
    Route::get('/loaikhuyenmai', [KhuyenMaiController::class, 'cauhinhkhuyenmai']);

    //setting
    Route::get('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'index']);
    Route::put('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'update'])->name('put.config.shipping');

    Route::get('/cau-hinh-bank', [SettingController::class, 'cauhinhbank'])->name('cauhinhbank');
    Route::post('/cau-hinh-bank',[SettingController::class, 'postCauhinhbank'])->name('post.cauhinhbank');


    Route::get('/role', [AdminHomeController::class, 'roles']);

    Route::get('logout', [LoginController::class, 'create'])->name('logout');
});