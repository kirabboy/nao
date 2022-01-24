<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\UsersParent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDaiLyController extends Controller
{
    public function canhan(){
        $user = User::get();
        $id_son = User::select('id')->pluck('id')->toArray();
        // dd($test = User::join('users_parent','users_parent.id_child', '=', 'users.id')
        // ->where('users_parent.id_child', '=', $id_son)->pluck('users_parent.id_dad','users_parent.id_child'));
        // dd(Users::join('users_parent','users.id','=','users_parent.id_child')
        // ->where('users',''))
        
        return view('admin.quanly.listcanhan',['user' => $user]);
    }

    public function chitietcanhan(){
        return view('admin.quanly.detailcanhan');
    }

    public function doinhom(){
        return view('admin.quanly.doinhom');
    }
}
