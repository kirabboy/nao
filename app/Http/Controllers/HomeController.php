<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->level > 0) {
            $blog_categories = BlogCategory::get();
            $new_blogs = Blog::paginate(5);
            return view('public.index', compact('user', 'blog_categories', 'new_blogs'));
        } else {
            Auth::logout();
            return redirect('/dang-nhap')->with('level','Hồ sơ Khách Hàng chưa được kích hoạt!');
        }
    }

    public function chiphi()
    {
        return view('public.users.hoahong.chiphi');
    }

    public function diemNAOnhanhtach()
    {
        return view('public.users.hoahong.diemNAOnhanhtach');
    }

    public function hoahong()
    {
        $user = Auth::user();
        return view('public.users.hoahong.hoahong', compact('user'));
    }

    public function hoahongbanle()
    {
        return view('public.users.hoahong.hoahongbanle');
    }

    public function hoahongnhom()
    {
        return view('public.users.hoahong.hoahongnhom');
    }

    public function tongNAOtrongthang()
    {
        return view('public.users.hoahong.tongNAOtrongthang');
    }


}
