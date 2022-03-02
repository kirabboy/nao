<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\shippingConfig;


class OrderController extends Controller
{
    public function getOrderAgency(Request $request){
        $orders = DB::table('orders')
        ->leftJoin('order_address', 'orders.id', '=', 'order_address.id_order')
        ->leftJoin('order_info', 'orders.id', '=', 'order_info.id_order')
        ->join('order_products', 'orders.id', '=', 'order_products.id_order')
        ->select("orders.id", "order_info.fullname", "orders.shipping_total", "orders.total", "orders.handler", "orders.created_at", "orders.status", DB::raw("count(order_products.id) as count_product"))
        ->groupBy("orders.id", "order_info.fullname", "orders.shipping_total", "orders.total", "orders.handler", "orders.created_at", "orders.status")->orderBy('id', 'DESC')
        ->get();
        $doanh_thu = Order::where('status', 3)->whereMonth('created_at', '=', Carbon::now('Asia/Ho_Chi_Minh')->month)->sum('total');
        return view('admin.order.don-hang-dai-ly', ['orders' => $orders, 'doanh_thu' => $doanh_thu]);
    }

    public function getOrderDetail(Order $order){

        $order_address = $order->order_address()->first();
        $provinces = Province::where('matinhthanh', '<>',$order_address->id_province)
        ->select('matinhthanh', 'tentinhthanh')->get();

        $districts = District::where([['maquanhuyen', '<>',$order_address->id_district], ['matinhthanh', '=', $order_address->id_province]])
        ->select('maquanhuyen', 'tenquanhuyen')->get();
        
        $wards = Ward::where([['maphuongxa', '<>',$order_address->id_ward], ['maquanhuyen', '=', $order_address->id_district]])
        ->select('maphuongxa', 'tenphuongxa')->get();
        
        $shipping_bill = $order->order_shipping()->get();

        $environment = shippingConfig::first()->production;

        return view('admin.order.chi-tiet-don-hang', [
                'order'=>$order, 
                'order_info'=>$order->order_info()->first(), 
                'order_address'=>$order_address, 
                'order_products'=>$order->products()->get(),
                'provinces'=>$provinces,
                'districts'=>$districts,
                'wards'=>$wards,
                'shipping_bill' => $shipping_bill,
                'environment' => $environment
            ]);
    }
    public function puthOrderUpdate(Request $request){
        $order = Order::find($request->in_id_order);
        
        if ($request->has('in_shipping')) {
            $order->shipping_total = $request->in_shipping;
            $order->shipping_method = $request->shipping_method;
            $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        }
        $order->created_at = $request->in_created_at;
        $order->save();
        $order->order_address()->first()->update([
            'id_province' => $request->sel_province,
            'id_district' => $request->sel_district,
            'id_ward' => $request->sel_ward,
            'address' => $request->address,
            'address_full' => $request->address.', '.Ward::where('maphuongxa', $request->sel_ward)->first()->tenphuongxa.', '.District::where('maquanhuyen', $request->sel_district)->first()->tenquanhuyen.', '.Province::where('matinhthanh', $request->sel_province)->first()->tentinhthanh,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        $order->order_info()->update([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        Session::flash('success','Sửa đơn hàng thành công');
        return back();
    }
    public function patchOrderDestroy(Request $request){
        Order::find($request->order_id)->update([
            'status' => 4
        ]);
        return $request->order_id;
    }
    public function deleteOrderDelete(Request $request){
        Order::find($request->order_id)->delete();
        return $request->order_id;
    }
    
}
