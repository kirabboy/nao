<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('public.users.profile.profile',['user'=>$user]);
    }

    public function info()
    {
        $user = Auth::user();

        // Chọn tỉnh thành
        if($user->id_province != null){
            $province = Province::whereNotIn('province.matinhthanh',[auth()->user()->id_province])->select('matinhthanh','tentinhthanh')->get();
            $user_province = DB::table('province')->join('users', 'users.id_province', '=', 'province.matinhthanh')
            ->where('province.matinhthanh','=',auth()->user()->id_province)
            ->select('province.tentinhthanh')->first()->tentinhthanh; 
        } else {
            $province = Province::select('matinhthanh','tentinhthanh')->get();
            $user_province = 'Chọn nơi bạn sống';
        }

        // Chọn quận huyện
        if($user->id_district != null){
            $district = District::whereNotIn('district.maquanhuyen',[auth()->user()->id_district])->get();
            $user_district = DB::table('district')->join('users', 'users.id_district', '=', 'district.maquanhuyen')
                ->where('district.maquanhuyen','=',auth()->user()->id_district)
                ->select('district.tenquanhuyen')->first()->tenquanhuyen;
        } else {
            $district = District::select('maquanhuyen','tenquanhuyen')->get();
            $user_district = 'Chọn quận huyện';
        }
        // Chọn phường xã
        if($user->id_ward != null){
            $ward = Ward::whereNotIn('ward.maphuongxa',[auth()->user()->id_ward])->get();
            $user_ward = DB::table('ward')->join('users', 'users.id_ward', '=', 'ward.maphuongxa')
                ->where('ward.maphuongxa','=',auth()->user()->id_ward)
                ->select('ward.tenphuongxa')->first()->tenphuongxa;
        } else {
            $ward = Ward::select('maphuongxa','tenphuongxa')->get();
            $user_ward = 'Chọn phường xã';
        }
        return view('public.users.profile.info',['user'=>$user,'province'=>$province,'user_province'=>$user_province,
            'district'=>$district,'user_district'=>$user_district,'ward'=>$ward,'user_ward'=>$user_ward]);
    }

    public function postInfo(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->sex = $request->sex;
        $user->cmnd = $request->cmnd;
        $user->cmnd_day = $request->cmnd_day;
        $user->id_province = $request->sel_province;
        $user->id_district = $request->sel_district;
        $user->id_ward = $request->sel_ward;
        $user->email = $request->email;
        $user->address = $request->address;

        $user->save();
        return redirect()->back();
    }

    public function thanhtoan()
    {
        $user = Auth::user();
        return view('public.users.profile.thanhtoan',['user'=>$user]);
    }

    public function postThanhtoan(Request $request)
    {
        $user = Auth::user();
        $user->bank = $request->bank;
        $user->bank_name = $request->bank_name;
        $user->bank_number = $request->bank_number;
        $user->bank_chinhanh = $request->bank_chinhanh;
        $user->save();
        
        return redirect()->back();
    }

    public function resetPassword () {
        return view('public.users.profile.resetPassword');
    }

    public function postResetPassword (Request $request) {
        $user = Auth::user();
        $this->validate($request, [
            'password' => 'required|min:3|max:30',
            're_password' => 'required|same:password'
        ],[
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu chỉ có nhìu nhất 30 ký tự',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu nhập lại chưa khớp'
        ]);
        if(Hash::check($request->passOld, $user->password)){
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
        }
        return redirect()->back();
    }
}
