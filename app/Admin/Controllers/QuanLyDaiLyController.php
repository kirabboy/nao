<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Exports\InfoUser;
use App\Exports\DanhSachDoiNhom;
use App\Models\UsersParent;

use Carbon\Carbon;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDaiLyController extends Controller
{
    public function canhan(){
        $user = User::with('getIdDad.getNameDad')->get();
        return view('admin.quanly.listcanhan',['user' => $user]);
    }

    public function dowListUser(Excel $excel) {
        return $excel->download(new InfoUser, 'listUser.xlsx');
    }

    public function chitietcanhan($id){
        $user = User::find($id);
        $user_age = Carbon::parse($user->birthday)->diff(Carbon::now())->format('%y');
        $customer = User::with('getIdCustomers')->get();
        $count_customer = $customer->find($id)->getIdCustomers->count();
        $user_child = User::with('getIdSon')->get();
        $count_child = $user_child->find($id)->getIdSon->count();
        return view('admin.quanly.detailcanhan',[
            'user' => $user,
            'user_age' => $user_age,
            'count_customer' => $count_customer,
            'count_child' => $count_child,
        ]);
    }

    public function doinhom(){
        $user = User::with('getIdDad.getNameDad')->get();
        return view('admin.quanly.doinhom', ['user'=>$user]);
    }

    public function detailDoiNhom($id) {
        $boss = User::find($id);
        $user = UsersParent::with('getNameSon')->where('id_dad','=',$id)->get();
        return view('admin.quanly.detailDoinhom', 
            ['user'=>$user,'boss'=>$boss]);
    }

    public function downDanhSach(Excel $excel,$id) {
        return $excel->download(new DanhSachDoiNhom($id), 'DanhSachDoiNhom.xlsx');
    }

    public function nangcapdaily() {
        $user = User::with('getNangcap')->get();
        //dd($user->find(1)->getNangcap->where('status','=',0));
        // $nangcap = UserUpgrade::
        return view('admin.quanly.nangcapdaily',['user' => $user]);
    }

    public function detailNangcap($id) {
        $user = User::with('getNangcap')->find($id);
        return view('admin.quanly.detailNangcap',['user' => $user]);
    }

    public function dailychinhthuc($id) {
        $user = User::with('getNangcap')->find($id);
        $user->level = 2;
        foreach($user->getNangcap->where('status','=',0) as $value) {
            $value->status = 1;
            $value->save();
        }
        $user->save();
        return redirect()->back();
    }

    public function dailytamthoi($id) {
        $user = User::with('getNangcap')->find($id);
        $user->level = 3;
        $user->save();
        foreach($user->getNangcap->where('status','=',0) as $value) {
            $value->status = 1;
            $value->save();
        }
        return redirect()->back();
    }
}
