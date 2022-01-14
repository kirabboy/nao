<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoinhomController extends Controller
{
    public function index()
    {
        $user = auth::user();
        $user_id = $user->id;
        $child_id = UsersParent::where('id_dad','=',$user_id)->pluck('id_child');
        $info_child = User::whereIn('id', $child_id)->get();
        return view('public.users.doinhom.doinhom',['info_child' => $info_child]);
    }

    public function chitietthanhvien($id)
    {
        $thanhvien = User::find($id);
        return view('public.users.doinhom.chitietthanhvien',['thanhvien'=>$thanhvien]);
    }
}