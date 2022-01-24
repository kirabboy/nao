<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Warehouse;
use App\Models\UserAddressShipping;
use App\Http\Controllers\ShippingController;

class CheckoutController extends Controller
{
    //Lấy phí ship: (new ShippingController)->postShippingFee(request());

    public function index(){
        if(Session::has('rowids')){
            
            $rowids = Session::get('rowids');
            $cart = Cart::instance('shopping');
            
            $address_shipping = Auth::user()->user_address_shipping; 

            $province = Province::all();
            $warehouse = Warehouse::select('id', 'name')->get();

            $subtotal = 0;
            foreach(explode(',',$rowids) as $rowid){
                $subtotal += $cart->get($rowid)->price *$cart->get($rowid)->qty; 
            }

            if($address_shipping){
                $district = District::whereMatinhthanh($address_shipping->province_id)->get();

                $ward = Ward::whereMaquanhuyen($address_shipping->district_id)->get();

                return view('public.checkout.index', compact('rowids', 'cart', 'subtotal', 'address_shipping', 'province', 'warehouse', 'district', 'ward'));
            }
            return view('public.checkout.index', compact('rowids', 'cart', 'subtotal', 'address_shipping', 'province', 'warehouse'));
        }else{
            return redirect()->route('cart.index');
        }
    }

    

    public function addAddressShipping(Request $request){
        $this->validate($request,[
            'fullname' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'warehouse_id' => 'required'
        ]);

        $data = $request->all();
        $province_name = Province::whereMatinhthanh($data['province_id'])->first()->tentinhthanh;
        $district_name = District::whereMaquanhuyen($data['district_id'])->first()->tenquanhuyen;
        $ward_name = Ward::whereMaphuongxa($data['ward_id'])->first()->tenphuongxa;
        $data['address_full'] = $data['address'].', '.$ward_name.', '.$district_name.', '.$province_name;

        $user_address_shipping = Auth::user()->user_address_shipping()->create($data);

        // return view('public.render.user_address_shipping')->with('address_shipping', $user_address_shipping)->render();
        return true;
    }

    public function editAddressShipping(Request $request, UserAddressShipping $address_shipping){
        $this->validate($request,[
            'fullname' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'warehouse_id' => 'required'
        ]);

        $data = $request->all();
        $province_name = Province::whereMatinhthanh($data['province_id'])->first()->tentinhthanh;
        $district_name = District::whereMaquanhuyen($data['district_id'])->first()->tenquanhuyen;
        $ward_name = Ward::whereMaphuongxa($data['ward_id'])->first()->tenphuongxa;
        $data['address_full'] = $data['address'].', '.$ward_name.', '.$district_name.', '.$province_name;

        $address_shipping->update($data);
        return true;
    }

    public function deleteAddressShipping(Request $request, UserAddressShipping $address_shipping){
        $address_shipping->delete();
        return back();
    }
}
