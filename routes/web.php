<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ShippingController; 
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DoinhomController;

use Illuminate\Support\Facades\Auth;


Route::get('dang-nhap', [LoginRegisterController::class, 'login'])->name('login');
Route::post('dang-nhap', [LoginRegisterController::class, 'postLogin'])->name('post.login');
Route::get('dang-xuat', [LoginRegisterController::class, 'logout'])->name('dang-xuat');

Route::get('dang-ky', [LoginRegisterController::class, 'register'])->name('register');
Route::post('dang-ky', [LoginRegisterController::class, 'postRegister'])->name('post.register');
Route::get('dang-ky/{mgt}', [LoginRegisterController::class, 'mgt']);

Route::get('dang-nhap-otp', function () {
    return view('public.user.login-otp');
})->name('login.otp');
// Route::get('dang-ky', function () {
//     return view('public.user.register');
// })->name('register');
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('khuyen-mai', function () {
        return view('public.sale');
    })->name('sale');
    Route::get('chi-tiet-khuyen-mai', function () {
        return view('public.sale-detail');
    })->name('sale.detail');
    Route::get('chuyen-khoan', function () {
        return view('public.payment');
    })->name('payment');

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

    // Profile User
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);

        Route::get('/info', [ProfileController::class, 'info']);
        Route::post('/info', [ProfileController::class, 'postInfo'])->name('updateInfo');

        Route::get('/thanhtoan', [ProfileController::class, 'thanhtoan']);
        Route::post('/thanhtoan', [ProfileController::class, 'postThanhtoan'])->name('updateThanhtoan');

        Route::get('/resetPassword', [ProfileController::class, 'resetPassword']);
        Route::post('/resetPassword', [ProfileController::class, 'postResetPassword'])->name('updateResetPassword');

        Route::get('/chuyenkhoan', [ProfileController::class, 'chuyenkhoan']);
        Route::get('/dangkynangcapdaily', [ProfileController::class, 'dangkynangcapdaily']);
        Route::get('/nangcapdaily', [ProfileController::class, 'nangcapdaily']);

    });

    Route::prefix('doinhom')->group(function () {
        Route::get('/', [DoinhomController::class, 'index'])->name('doinhom.index');
        Route::get('/{id}', [DoinhomController::class, 'chitietthanhvien'])->name('doinhom.show');
    });
    
    // Profile khach hang cua user
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'listCustomer'])->name('listCustomer');
        Route::post('/', [CustomerController::class, 'postListCustomer'])->name('get.listCustomer');

        Route::prefix('/{id}')->group(function () {
            Route::get('/',[CustomerController::class, 'index'])->name('detailCustomer');
            Route::post('/',[CustomerController::class, 'postDetailCustomer'])->name('postDetailCustomer');

            Route::get('/themdiachi',[CustomerController::class, 'customer_address']);
            Route::post('/themdiachi', [CustomerController::class, 'postCustomer_address']);

            Route::get('/diachi/{info_address}',[CustomerController::class, 'chitietdiachi'])->name('chitietdiachi');
            Route::post('/diachi/{info_address}',[CustomerController::class, 'postChitietdiachi'])->name('post.chitietdiachi');
            Route::match(['delete', 'get'],'/diachi/{info_address}/xoa',[CustomerController::class, 'xoadiachi']);
            
        });
    });

    // Hoa hong 
    Route::get('/hoahong', [HomeController::class, 'hoahong']);
    Route::get('/hoahongbanle', [HomeController::class, 'hoahongbanle']);
    Route::get('/hoahongnhom', [HomeController::class, 'hoahongnhom']);
    Route::get('/chiphi', [HomeController::class, 'chiphi']);
    Route::get('/diemNAOnhanhtach', [HomeController::class, 'diemNAOnhanhtach']);
    Route::get('/tongNAOtrongthang', [HomeController::class, 'tongNAOtrongthang']);

    Route::get('/chuyenkhoan', [HomeController::class, 'chuyenkhoan']);
    Route::get('/dangkynangcapdaily', [HomeController::class, 'dangkynangcapdaily']);
    Route::get('/nangcapdaily', [HomeController::class, 'nangcapdaily']);
});

// MINH START

// Route::post('/dang-nhap', [ProductController::class, 'postLogin'])->name('postlogin');
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


    //----------------vận chuyển---------------
    Route::get('test-van-chuyen', [ShippingController::class, 'postShippingFee']);

    Route::get('lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

    Route::get('lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

    Route::post('tinh-phi-van-chuyen', [ShippingController::class, 'postShippingFee'])->name('post.shippingFee');

