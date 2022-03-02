<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingBill;
use App\Admin\Controllers\UserDetailController;

class WebhookVnPostController extends Controller
{
    public function orderShippingDetect(Request $request){
        $bodyContent = $request->all();
        $response = json_decode($bodyContent['Data'], true );
        if($shipping_bill = ShippingBill::where('shipping_id', $response['Id'])->first()){
            $shipping_status = Shipping_status::where('status_id', $response['OrderStatusId'])->first();
            $shipping_bill->update([ 
                'status' => $response['OrderStatusId'], 
                'note' => $shipping_status->note
             ]);
             $order = $shipping_bill->order()->first();
             $order->update([
                'status' => $shipping_status->status_step
            ]);
            
            $shipping_bill->shipping_history()->create([
                'status' => $response['OrderStatusId']
            ]);
            if($shipping_status->status_step == 3){
                (new UserDetailController)->tinhtienmuahang ($order->id_user, $order->sub_total, $order->nao_point);
            }
        }
        return true;
    }
}
