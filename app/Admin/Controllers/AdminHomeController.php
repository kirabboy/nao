<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }

}
