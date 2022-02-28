<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Warehouse;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Http\Controllers\CheckoutController;

class AddressCustomerController extends Controller
{
    //

    public function index(){
        $province = Province::all();
        $warehouse = Warehouse::select('id', 'name')->get();

    	return view('public.checkout.add_customer_address', compact('province', 'warehouse'));
    }

    public function addAddressShipping(Request $request)
    {
        $this->validate($request, [
        	'isOldCustomer' => 'required',
            'fullname' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'warehouse_id' => 'required'
        ]);
        $data = $request->all();
        if($data['isOldCustomer'] == 0){
			$result = $this->AddressNewCustomer($data);
			Session::put('customer_address', $result);
			return redirect()->route('checkout.index');

        }elseif($data['isOldCustomer'] == 1){
        	$result = $this->AddressOldCustomer($data);
        	Session::put('customer_address', $result);
        	return redirect()->route('checkout.index');
        }else{
        	Session::flash('error', 'Vui lòng tải lại trang');
        	return back();
        }
    }

    public function AddressNewCustomer($data){

    	$user_id = auth()->user()->id;
        $customer = new Customer;

        $customer->id_ofuser = $user_id;
        $customer->name = $data['fullname'];
        $customer->phone = $data['phone'];
        $number_code = $customer->count() + 1;
        $customer->code_customer = 'FKC'.$number_code;
        $customer->save();

        $address = new CustomerAddress;

        $address->id_customer = $customer->id;
        $address->id_province = $data['province_id'];
        $address->id_district = $data['district_id'];
        $address->id_ward = $data['ward_id'];
        $address->address = $data['address'];
        $address->id_warehouse = $data['warehouse_id'];
        $address->save();
        return $address->load(['customer']);
    }
    public function AddressOldCustomer($data){

    	$address = CustomerAddress::find($data['id']);
        $address->id_province = $data['province_id'];
        $address->id_district = $data['district_id'];
        $address->id_ward = $data['ward_id'];
        $address->address = $data['address'];
        $address->id_warehouse = $data['warehouse_id'];
        $address->save();
        
        return $address->load(['customer']);
    }

    public function searchAddressCusstomer(Request $request){

    	$customer = Customer::select('id', 'name')->where('id_ofuser', auth()->user()->id)->where('name', 'like', '%'.$request->key.'%')->with('customer_address:id,id_customer,id_province,id_district,id_ward,address')->take(10)->get();
    	$checkoutController = new CheckoutController;
    	$html = '';
    	if($customer){
    		foreach ($customer as $value) {
	    		foreach ($value->customer_address as $value1) {
	    			$html .= '<li data-id="'.$value1->id.'" class="list-group-item">
		    		<p>'.$value->name.'</p>
		    		<small>'.$checkoutController->addressFull($value1->id_province, $value1->id_district, $value1->id_ward, $value1->address).'</small>
		    		</li>';	
	    		}
	    	}
	    	return $html;
    	}
    	return '';
    	
    }
    public function responseInfoCustomer(Request $request){
    	$customer_address = CustomerAddress::whereId($request->id)->with('customer:id,name,phone')->first();
    	$data = array();
    	$data['id'] = $customer_address->id;
    	$data['name'] = $customer_address->customer->name;
    	$data['phone'] = $customer_address->customer->phone;
    	$data['address'] = $customer_address->address;
    	$data['province'] = '';
    	$data['district'] = '';
    	$data['ward'] = '';
    	$data['warehouse'] = '';


    	$province = Province::all();

    	foreach ($province as $value) {
    		$data['province'] .='<option '.selected($value->matinhthanh, $customer_address->id_province).' value="'.$value->matinhthanh.'">'.$value->tentinhthanh.'</option>';
    	}

    	$district = District::whereMatinhthanh($customer_address->id_province)->get();

    	foreach ($district as $value) {
    		$data['district'] .='<option '.selected($value->maquanhuyen, $customer_address->id_district).' value="'.$value->maquanhuyen.'">'.$value->tenquanhuyen.'</option>';
    	}

        $ward = Ward::whereMaquanhuyen($customer_address->id_district)->get();
		foreach ($ward as $value) {
    		$data['ward'] .='<option '.selected($value->maphuongxa, $customer_address->id_ward).' value="'.$value->maphuongxa.'">'.$value->tenphuongxa.'</option>';
    	}

    	$warehouse = Warehouse::select('id', 'name')->get();

    	foreach ($warehouse as $value) {
    		$data['warehouse'] .='<option '.selected($value->id, $customer_address->id_warehouse).' value="'.$value->id.'">'.$value->name.'</option>';
    	}
    	return $data;
    }
    
}
