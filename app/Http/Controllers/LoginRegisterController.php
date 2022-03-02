<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PointNAO;
use App\Models\UsersParent;
use App\Models\DoanhThuNgay;
use App\Models\SettingBank;
use App\Models\UserUpgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;

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
        
        //dd(User::where('phone','=','0123456789')->value('phone'));
        //dd(User::where('phone','=','0123456789')->where('phone','!=','0123456789')->get()->count());
        $bank = SettingBank::first();
        return view('public.user.register',compact('bank'));
    }

    public function postRegister (Request $request) {
        $user = new User;
        $this->validate($request,[
            'phone' => 'required|numeric|min:5|min:15|unique:users',
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
        $user->id = User::max('id') + 1;
        $user->level = 0;
        
        $magioithieu = $request->magioithieu;
        $value = User::where('code_user' ,'=', $magioithieu)->first();
        
        if($value->value('code_user') == null) {
            return 'Khong co ma gioi thieu nay';
        } else {
            
            $point = new PointNAO;
            $point->user_id = $user->id;
            $point->save();

            $parent = new UsersParent;
            $parent->id_dad = $value->id;
            $parent->id_child = $user->id;
            $parent->nhanh = $value->id;
            //
            $parent->save();
            $user->save();

            $lichsu_user_register = new DoanhThuNgay;
            $lichsu_user_register->user_id = $user->id;
            $lichsu_user_register->save();

            $upgrade = new UserUpgrade;
            $upgrade->user_id = $user->id;
            if($request->hasFile('imageChuyenKhoan')) {
                $file = $request->imageChuyenKhoan;
                $file_name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/user/nangcap');
                $file->move($destinationPath, $file_name);
                $upgrade->image = $file_name;
            }
            $upgrade->save();
            return redirect('/')->with('thongbao','Đăng ký thành công');
        }
    }

    public function mgt($mgt) {
        if(Auth::check()){
            return redirect('/');
        }
        return view('public.user.mgt',['mgt'=>$mgt]);
    }

    public function magioithieu(Request $request) {
        $id_user = User::where('code_user','=',$request->id)->first();
        if ($id_user != null) {
            $note = '<style>input#magioithieu { border-color: #28a745; }</style><p class="px-2 text-success">Mã giới thiệu '.$request->id.' hợp lệ</p>';
        } else {
            $note = '<style>input#magioithieu { border-color: red; }</style><p class="px-2 text-danger">Mã giới thiệu '.$request->id.' không tồn tại!</p>';
        }

        $check_trung_phone = User::where('phone','=',$request->phone)->value('phone');

        if ($check_trung_phone == null && $request->phone != null) {
            if(is_numeric($request->phone) == false) {
                $phone = '<style>input#phone { border-color: red; }</style><p class="px-2 text-danger">Số điện thoại chứa ký tự không hợp lệ</p>';
            } else {
                if ($request->phone > 100000000 && $request->phone < 9999999999) {
                    $phone = '<style>input#phone { border-color: #28a745; }</style><p class="px-2 text-success">Số điện thoại '.$request->phone.' hợp lệ!</p>';
                } else {
                    $phone = '<style>input#phone { border-color: red; }</style><p class="px-2 text-danger">Số điện thoại không đúng định dạng.</p>';
                }
                
            }
        } elseif ($check_trung_phone == $request->phone && $request->phone != null) {
            $phone = '<style>input#phone { border-color: red; }</style><p class="px-2 text-danger">Số điện thoại '.$request->phone.' đã được đăng ký!';
        } elseif ($request->phone == '') {
            $phone = '<style>input#phone { border-color: red; }</style><p class="px-2 text-danger">Số điện thoại không được bỏ trống';
        }
        return response()->json([
            'note' => $note,
            'phone' => $phone,
        ]);
    }
}