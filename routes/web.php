<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Admin\MainController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/danh-sach-san-pham-dai-ly', function () {
//     return view('public.product.shop.shop_agent');
// });
// Route::get('/danh-sach-san-pham-ctv', function () {
//     return view('public.product.shop.shop_collab');
// });

// Route::get('/chi-tiet-san-pham-ctv', function () {
//     return view('public.product.detail.product_detail_collab');
// });

// Route::get('/chi-tiet-san-pham-dai-ly', function () {
//     return view('public.product.detail.product_detail_agent');
// });

// Route::get('/gio-hang', function () {
//     return view('public.cart.cart_index');
// });

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

// ----------------------------------------------------------------Thinh----------------------------------------------------------------

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

    Route::get('/chuyenkhoan', [HomeController::class, 'chuyenkhoan']);
    Route::get('/dangkynangcapdaily', [HomeController::class, 'dangkynangcapdaily']);
    Route::get('/nangcapdaily', [HomeController::class, 'nangcapdaily']);
});

// MINH START

Route::post('/dang-nhap', [ProductController::class, 'postLogin'])->name('postlogin');
Route::get('/san-pham', [ProductController::class, 'index'])->name('product.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'detail'])->name('product.detail');

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


//----------------vận chuyển---------------
Route::get('test-van-chuyen', [ShippingController::class, 'postShippingFee']);

Route::get('lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

Route::get('lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

Route::post('tinh-phi-van-chuyen', [ShippingController::class, 'postShippingFee'])->name('post.shippingFee');
