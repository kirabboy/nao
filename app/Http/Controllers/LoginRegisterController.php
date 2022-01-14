<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function login () {
        if(Auth::check()){
            return redirect('/');
        }

        return view('public.user.login');
    }

    public function postLogin (Request $request) {
        $this->validate($request,[
            'phone' => 'required|numeric|exists:users',
            'password' => 'required',
        ],[
            'phone.exists' => 'Số điện thoại này chưa được đăng ký trên hệ thống!',
            'phone.required' => 'Bạn chưa nhập số điện thoại đăng nhập',
            'phone.numeric' => 'Định dạng số điện thoại không đúng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);

        if (Auth::attempt([
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            return redirect()->route('home');
        } 
        else {
            return redirect('/')->with('thongbao','Hồ sơ Khách Hàng không tồn tại');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function register() {
        if(Auth::check()){
            return redirect('/');
        }
        return view('public.user.register');
    }

    public function postRegister (Request $request) {
        $user = new User;
        $this->validate($request,[
            'phone' => 'required|numeric|min:5|min:15|unique:phone',
            'password' => 'required|min:5|max:30',
        ],[
            'phone.min' => 'Số điện thoại không đúng',
            'phone.max' => 'Định dạng số điện thoại không tồn tại',
            'phone.unique' => 'Số điện đã được đăng ký tài khoản',
            'phone.numeric' => 'Định dạng số điện thoại không đúng',
            'password.min' => 'Mật khẩu quá ngắn',
            'password.max' => 'Mật khẩu quá dài',
        ]);

        $user->phone = $request->input('phone');
        $number_code = sprintf("%06d",User::max('id') + 1);
        $user->code_user = 'NAO'.$number_code;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/')->with('thongbao','Đăng ký thành công');
    }

    public function mgt($mgt) {
        if(Auth::check()){
            return redirect('/');
        }
        return view('public.user.mgt',['mgt'=>$mgt]);
    }
}