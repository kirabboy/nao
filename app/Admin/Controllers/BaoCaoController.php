<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaoCaoController extends Controller
{
    public function index(){
        return view('admin.baocao.baocao');
    }

    public function chitiet() {
        return view('admin.baocao.chitietbaocao');
    }
}
