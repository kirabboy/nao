<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shippingConfig;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ConfigShippingController extends Controller
{
    //
    public function index(){
        $config = shippingConfig::first();
        return view('admin.setting.shipping-config', compact('config'));
    }

    public function update(Request $request){
        if($this->updateTokenVnPost($request->in_production, $request->in_username, $request->in_password) == false){
            Session::flash('error', 'Tài khoản VnPost này không hợp lệ!');
            return back();
        }
        shippingConfig::first()->update([
            'username' => $request->in_username,
            'password' => $request->in_password,
            'production' => $request->in_production,
            'package_viewable' => $request->in_package_view,
            'pickup_type' => $request->in_pickup_type,
            'order_amount_evaluation' => $request->in_order_amount_evaluation
        ]);
        
        Session::flash('success', 'Bạn đã cập nhật thành công!');
        return back();
        
    }

    public function checkEnvironmentConfig($check) {
        if($check == true){
            return 'https://donhang.vnpost.vn';
        }
        return 'https://donhang-uat.vnpost.vn';
    }

    public function updateTokenVnPost($environment, $username, $password){

        $get_link = $this->checkEnvironmentConfig($environment);

        $response = Http::accept('application/json')->post($get_link.'/api/api/MobileAuthentication/GetAccessToken', [
            'TenDangNhap' => $username,
            'MatKhau' => $password
        ]);

        if(!$response['IsSuccess']){
            return false;
        }
        shippingConfig::first()->update([
            'token' => $response['Token']
        ]);
        return $response['Token'];
    }

}
