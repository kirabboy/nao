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

Route::get('/', [AdminHomeController::class, 'index']);

Route::get('ca-nhan', function () {
    return view('admin.ca-nhan');
});

Route::get('cau-hinh-khuyen-mai', function () {
    return view('admin.cau-hinh-khuyen-mai');
});

Route::get('dang-nhap', function () {
    return view('admin.dang-nhap');
});

Route::get('doi-nhom', function () {
    return view('admin.doi-nhom');
});

Route::get('ket-qua-dao-tao', function () {
    return view('admin.ket-qua-dao-tao');
});

Route::get('loai-khuyen-mai', function () {
    return view('admin.loai-khuyen-mai');
});
Route::prefix('don-hang')->group(function () {

    Route::get('don-hang-cnpp', function () {
        return view('admin.order.don-hang-cnpp');
    })->name('orderadmin.CNNPP');
    
    Route::get('don-hang-dai-ly', [OrderController::class, 'getOrderAgency'])->name('orderadmin.agency');
    
    Route::get('don-hang-doi-thu-dai-ly', function () {
        return view('admin.order.don-hang-doi-thu-dai-ly');
    })->name('orderadmin.doithuAgency');
    
    Route::get('don-hang-tra-chi-nhanh-npp', function () {
        return view('admin.order.don-hang-tra-chi-nhanh-npp');
    })->name('orderadmin.backCNNPP');
    
    Route::get('don-hang-tra-dai-ly', function () {
        return view('admin.order.don-hang-tra-dai-ly');
    })->name('orderadmin.backAgency');
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

//setting
Route::get('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'index']);
Route::put('/cau-hinh-van-chuyen', [ConfigShippingController::class, 'update'])->name('put.config.shipping');

Route::get('/login', [AdminHomeController::class, 'login']);
Route::post('/login', [AdminHomeController::class, 'postLogin'])->name('admin.login');