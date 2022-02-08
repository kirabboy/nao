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
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderAddress;
use App\Models\OrderPayment;
use App\Models\OrderInfo;
use App\Models\UserAddressShipping;
use App\Http\Controllers\ShippingController;

class CheckoutController extends Controller
{
    //Lấy phí ship: (new ShippingController)->postShippingFee(request());

    public function index()
    {
        $user = Auth::user();
        if (Session::has('rowids')) {
            $rowids = Session::get('rowids');
            $cart = Cart::instance('shopping');

            $address_shipping = Auth::user()->user_address_shipping;

            $province = Province::all();
            $warehouse = Warehouse::select('id', 'name')->get();

            $subtotal = 0;
            $nao_point = 0;
            foreach (explode(',', $rowids) as $rowid) {
                $subtotal += $cart->get($rowid)->price * $cart->get($rowid)->qty;
                $nao_point += $cart->get($rowid)->model->productPrice()->value('nao_point');
            }
            if ($address_shipping) {
                $district = District::whereMatinhthanh($address_shipping->province_id)->get();

                $ward = Ward::whereMaquanhuyen($address_shipping->district_id)->get();

                return view('public.checkout.index', compact('user', 'nao_point', 'rowids', 'cart', 'subtotal', 'address_shipping', 'province', 'warehouse', 'district', 'ward'));
            }
            return view('public.checkout.index', compact('user', 'nao_point', 'rowids', 'cart', 'subtotal', 'address_shipping', 'province', 'warehouse'));
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function postOrder(Request $request)
    {
        $this->validate($request, [
            'shipping_method' => 'required'
        ], [
            'shipping_method.required' => 'Bạn chưa chọn đơn vị vận chuyển',
        ]);
        $user = Auth::user();
        $data = $request->all();
        $rowids = Session::get('rowids');
        $cart = Cart::instance('shopping');
        $address_shipping = UserAddressShipping::whereId($data['address_id'])->first();
        $order = Order::create([
            'id_user' => $user->id,
            'warehouse_id' => $address_shipping->warehouse_id
        ]);
        $subtotal = 0;
        $nao_point = 0;
        foreach (explode(',', $rowids) as $rowid) {
            $row = $cart->get($rowid);
            $subtotal += $row->price * $cart->get($rowid)->qty;
            $nao_point += $row->model->productPrice()->value('nao_point');
            OrderProduct::create([
                'id_order' => $order->id,
                'id_product' => $row->id,
                'name' => $row->name,
                'slug' => $row->model->slug,
                'feature_img' => $row->model->feature_img,
                'quantity' => $row->qty,
                'price' => $row->price,
                'nao_point' => $row->model->productPrice()->value('nao_point')
            ]);
            Cart::remove($rowid);

        }
        if($user->level == 1){
            $nao_point = 0;
        }
        $order->shipping_method = $data['shipping_method'];
        $order->shipping_total = $data['fee_shipping'];
        $order->fee_process = $data['fee_process'];
        $order->sub_total = $subtotal;
        $order->total = $subtotal + $data['fee_process'] + $data['fee_shipping'];
        $order->order_code = 'NAO-' . time();
        $order->nao_point = $nao_point;
        $order->save();
        OrderAddress::create([
            'id_order' => $order->id,
            'id_province' => $address_shipping->province_id,
            'id_district' => $address_shipping->district_id,
            'id_ward' => $address_shipping->ward_id,
            'address' => $address_shipping->address,
            'address_full' => $address_shipping->address_full
        ]);
        OrderInfo::create([
            'id_order' => $order->id,
            'fullname' => $address_shipping->fullname,
            'phone' => $address_shipping->phone
        ]);
        return redirect()->route('checkout.payment', ['order_code' => $order->order_code]);
    }

    public function getPayment(Request $request)
    {
        $user = Auth::user();
        $order_code = $request->order_code;
        $order = Order::whereOrderCode($order_code)->first();
        if($order->is_payment == 1){
            return view('public.checkout.success');
        }
        return view('public.checkout.payment', compact('order'));
    }

    public function postPayment(Request $request)
    {
        $images = array();
        $order = Order::whereId($request->order_id)->first();
        if($order->is_payment == 1){
            return view('public.checkout.success');
        }
        if ($request->hasFile('images')) {
            $files = $request->images;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('public/order/images', $name);
                $images[] = 'public/order/images'.$name;
            }
        }
        OrderPayment::create([
            'id_order' => $request->order_id,
            'images' => implode(',', $images)
        ]);
        Order::whereId($request->order_id)->update(['is_payment'=> 1]);
       
        return view('public.checkout.success');
    }


    public function addAddressShipping(Request $request)
    {
        $this->validate($request, [
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
        $data['address_full'] = $data['address'] . ', ' . $ward_name . ', ' . $district_name . ', ' . $province_name;

        $user_address_shipping = Auth::user()->user_address_shipping()->create($data);

        // return view('public.render.user_address_shipping')->with('address_shipping', $user_address_shipping)->render();
        return true;
    }

    public function editAddressShipping(Request $request, UserAddressShipping $address_shipping)
    {
        $this->validate($request, [
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
        $data['address_full'] = $data['address'] . ', ' . $ward_name . ', ' . $district_name . ', ' . $province_name;

        $address_shipping->update($data);
        return true;
    }

    public function deleteAddressShipping(Request $request, UserAddressShipping $address_shipping)
    {
        $address_shipping->delete();
        return back();
    }
}
