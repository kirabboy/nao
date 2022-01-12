<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function login () {
        if(Auth::check()){
            return redirect('/');
        }

        return view('public.user.login');
    }

    public function postLogin (Request $request) {
        $this->validate($request,[
            'phone' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function register() {
        return view('public.user.register');
    }

    public function postRegister (Request $request) {
        $user = new User;
        $this->validate($request,[
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user->phone = $request->input('phone');
        $number_code = sprintf("%06d",User::max('id') + 1);
        $user->code_user = 'NAO'.$number_code;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/');
    }
}