<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\SettingBank;

class SettingController extends Controller
{
    public function cauhinhbank () {
        $bank = SettingBank::first();
        return view('admin.setting.set_bank',['bank'=>$bank]);
    }

    public function postCauhinhbank (Request $request) {
        $bank = SettingBank::first();
        $bank->bank_name = $request->bank_name;
        $bank->bank_chinhanh = $request->bank_chinhanh;
        $bank->bank_number = $request->bank_number;
        $bank->bank_boss = $request->bank_boss;
        $bank->price_upgrade = $request->price_upgrade;
        $bank->note = $request->note;
        $bank->save();
        return redirect()->back();
    }
}
