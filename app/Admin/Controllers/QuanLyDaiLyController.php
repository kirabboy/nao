<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDaiLyController extends Controller
{
    public function canhan(){
        return view('admin.quanly.listcanhan');
    }

    public function chitietcanhan(){
        return view('admin.quanly.detailcanhan');
    }

    public function doinhom(){
        return view('admin.quanly.doinhom');
    }
}
