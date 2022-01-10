<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function cauhinhkhuyenmai(){
        return view('admin.khuyenmai.cau-hinh-khuyen-mai');
    }

    public function loaikhuyenmai(){
        return view('admin.khuyenmai.loai-khuyen-mai');
    }
}
