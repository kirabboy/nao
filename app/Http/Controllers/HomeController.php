<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('public.index',['user'=>$user]);
    }

    public function chitietthanhvien()
    {
        return view('public.users.doinhom.chitietthanhvien');
    }

    public function doinhom()
    {
        return view('public.users.doinhom.doinhom');
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
        return view('public.users.hoahong.hoahong');
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

    public function nangcapdaily()
    {
        return view('public.users.nangcaptaikhoan.nangcapdaily');
    }

    public function chuyenkhoan()
    {
        return view('public.users.nangcaptaikhoan.chuyenkhoan');
    }

    public function dangkynangcapdaily()
    {
        return view('public.users.nangcaptaikhoan.dangkynangcapdaily');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
