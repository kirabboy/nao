<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\CustomerAddress;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function listCustomer() {
        $user = Auth::user();
        $customer = Customer::where('id_ofuser', '=', $user->id)->get();
        $count_customers = $customer->count();
        return view('public.customer.list_customer',['customer'=>$customer,'user'=>$user,'count_customers'=>$count_customers]);
    }

    public function postListCustomer(Request $request) {
        $user_id = auth()->user()->id;
        $customer = new Customer;
        $customer->id_ofuser = $user_id;
        $customer->name = $request->name;
        $customer->birthday = $request->birthday;
        $customer->email = $request->email;
        $customer->sex = $request->sex;
        $customer->phone = $request->phone;
        $customer->facebook = $request->facebook;
        $customer->online = $request->online;
        $number_code = sprintf("%03d",$customer->count() + 1);
        $customer->code_customer = 'FKC'.$number_code;

        $customer->save();
        return redirect()->back();
    }
     
    public function index($id)
    {
        $user = Auth::user();
        $customer = Customer::find($id);
        $address = CustomerAddress::where('id_customer', '=', $customer->id)->get();
        $province = Province::where('matinhthanh', '=', $customer->id_province)->get();
        return view('public.customer.customer_detail',['customer' => $customer,'user'=>$user,'address'=>$address]);
    }

    public function customer_address($id) {
        $customer = Customer::find($id);
        $province = Province::select('matinhthanh','tentinhthanh')->get();
        return view('public.customer.add_address',['customer' => $customer,'province'=>$province]);
    }

    public function postCustomer_address(Request $request,$id) {
        $customer = Customer::find($id);
        $address = new CustomerAddress;
        $address->id_customer = $customer->id;
        $address->id_province = $request->sel_province;
        $address->id_district = $request->sel_district;
        $address->id_ward = $request->sel_ward;
        $address->address = $request->address;
        $address->save();
        return redirect()->back();
    }

    public function postDetailCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->birthday = $request->birthday;
        $customer->email = $request->email;
        $customer->sex = $request->sex;
        $customer->phone = $request->phone;
        $customer->facebook = $request->facebook;

        $customer->note = $request->note;
        $customer->save();
        return redirect()->back();
    }

    public function chitietdiachi($id,$info_address) {
        $customer = Customer::find($id);
        $address_ofCustomer = CustomerAddress::find($info_address);
        $province = Province::select('matinhthanh','tentinhthanh')->get();
        $user_province = DB::table('province')->join('customer_address', 'customer_address.id_province', '=', 'province.matinhthanh')
        ->where('province.matinhthanh','=',$address_ofCustomer->id_province)
        ->select('province.tentinhthanh')->first()->tentinhthanh; 

        $district = District::select('maquanhuyen','tenquanhuyen')->get();
        $user_district = DB::table('district')->join('customer_address', 'customer_address.id_district', '=', 'district.maquanhuyen')
        ->where('district.maquanhuyen','=',$address_ofCustomer->id_district)
        ->select('district.tenquanhuyen')->first()->tenquanhuyen;

        $ward = Ward::select('maphuongxa','tenphuongxa')->get();
        $user_ward = DB::table('ward')->join('customer_address', 'customer_address.id_ward', '=', 'ward.maphuongxa')
        ->where('ward.maphuongxa','=',$address_ofCustomer->id_ward)
        ->select('ward.tenphuongxa')->first()->tenphuongxa;

        return view('public.customer.detail_address',[
            'customer'=>$customer,
            'province'=>$province,
            'address'=>$address_ofCustomer,
            'user_province'=>$user_province,
            'user_district'=>$user_district,
            'user_ward'=>$user_ward
        ]);
    }

    public function postChitietdiachi(Request $request,$id,$info_address) {
        $customer = Customer::find($id);
        $address = CustomerAddress::find($info_address);
        $address->id_province = $request->sel_province;
        $address->id_district = $request->sel_district;
        $address->id_ward = $request->sel_ward;
        $address->address = $request->address;
        $address->save();
        $link_back =route('detailCustomer',$customer->id);
        return redirect($link_back);
    }
    
    public function xoadiachi ($id,$info_address) {
        CustomerAddress::where('id',$info_address)->delete();
        return redirect()->back();
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
