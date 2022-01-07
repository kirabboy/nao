<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\ShippingBill;
use App\Models\shippingConfig;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ShippingController as CallShippingController;
use App\Admin\Controllers\ConfigShippingController;

class ShippingController extends Controller
{
    private $configShippingController;

    public function __construct(){
        $this->configShippingController = new ConfigShippingController;
    }

    public function create(Request $request){

        $order = Order::find($request->in_id_order);

        //Tên gói hàng
        $package_content = '';

        //lấy thể tích của đơn hàng
        $products = $order->products()->select('height', 'weight', 'length', 'width', 'name')->get();

        foreach($products as $key => $value){
            if($key < count($products)-1){
                $package_content .= $value->name.' x'.$value->pivot->quantity.', ';
            }else{
                $package_content .= $value->name.' x'.$value->pivot->quantity;
            }
        }
        
        $order_info = $order->order_info()->first();
        $order_address = $order->order_address()->first();

        //gọi hàm tính thể tích đơn hàng
        $shippingController = new CallShippingController;        
        $calc = $shippingController->calculateProductShippingAdmin($products);

        $shipping_config = ShippingConfig::select('production', 'username', 'password')->first();

        //lấy link môi trường.
        $get_link = $this->configShippingController->checkEnvironmentConfig($shipping_config->production);

        //gọi hàm tạo đơn hàng
        $response_create = $this->callApiCreateShippingOrder($order_info, $order_address, $order, $package_content, $calc, $get_link);

        //token hết thời gian.
        if($response_create->status() == 401){

            //cập nhật lại token
            $this->configShippingController->updateTokenVnPost($shipping_config->production, $shipping_config->username, $shipping_config->password);

            //gọi lại hàm tạo đơn hàng vận chuyển
            $response_create = $this->callApiCreateShippingOrder($order_info, $order_address, $order, $package_content, $calc);
        }
        //
        $response_create = json_decode($response_create, true);

        $this->createShippingBill($order, $response_create);
        $order->update([
            'status' => 1, 
            'status_shipping' => $response_create['OrderStatusId'],
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);

        $shipping_bill = ShippingBill::where('order_id', $order->id)->get();

        $html = view('admin.template-render.create-order-shipping-success', 
                    ['shipping_bill' => $shipping_bill])->render();

        return $html;
    }

    public function getInfoShipping(Request $request){

        $order = Order::findOrFail($request->id_order);
        $order_address = $order->order_address()->first();

        $province = Province::where('matinhthanh', $order_address->id_province)->first();

        $district = $province->district()->where('maquanhuyen', $order_address->id_district)->first();

        $ward = $district->ward()->where('maphuongxa', $order_address->id_ward)->first();
        
        $address = $order_address->address.', '.$ward->tenphuongxa.', '.$district->tenquanhuyen.', '.$province->tentinhthanh;
        
        $html = view('admin.template-render.create-order-shipping', [
            'order'=>$order, 
            'order_info'=>$order->order_info()->first(), 
            'order_address'=>$order_address, 
            'order_products'=>$order->products()->get(),
            'address'=>$address,
            ])->render();
        return $html;
    }

    public function callApiCreateShippingOrder($order_info, $order_address, $order, $package_content, $calc, $get_link){
        
        //lấy cấu hình vận chuyển
        $shipping_config = ShippingConfig::first();

        $response_create = Http::withHeaders([
            'Content-Type' => 'application/json',
            'h-token' => $shipping_config->token
        ])->post($get_link.'/api/api/CustomerConnect/CreateOrder', [
            "SenderTel" => "0987818811",
            "SenderFullname" => "công ty dược vũ đức test",
            "SenderAddress" => "15 đường số 7 kdc cityland trần thị nghỉ",
            "SenderWardId" => "72710",
            "SenderDistrictId" => "7270",
            "SenderProvinceId" => "70",
            "ReceiverTel" => $order_info->phone,
            "ReceiverFullname" => $order_info->fullname,
            "ReceiverAddress" => $order_address->address,
            "ReceiverWardId" => $order_address->id_ward,
            "ReceiverDistrictId" => $order_address->id_district,
            "ReceiverProvinceId" => $order_address->id_province,
            "ReceiverAddressType" => 1,
            "ServiceName" => $order->shipping_method,
            "OrderCode" => "",
            "PackageContent" => $package_content,
            "WeightEvaluation" => $calc['weight'],
            "WidthEvaluation" => $calc['width'],
            "LengthEvaluation" => $calc['length'],
            "HeightEvaluation" => $calc['height'],
            "IsPackageViewable" => $shipping_config->package_viewable,
            "CustomerNote" => $order_info->note,
            "PickupType" => $shipping_config->pickup_type,
            "CodAmountEvaluation" => $order->sub_total,
            "IsReceiverPayFreight" => true,
            "OrderAmountEvaluation" => $shipping_config->order_amount_evaluation == true ? $order->sub_total : 0,
            "UseBaoPhat" => $shipping_config->use_bao_phat,
            "UseHoaDon" => $shipping_config->use_hoa_don,
            "PickupPoscode" => 0,
            "UseNhanTinSmsNguoiNhanTruocPhat" => $shipping_config->use_nhan_tin_sms_nguoi_nhan_truoc_phat,
            "UseNhanTinSmsNguoiNhanSauPhat" => $shipping_config->use_nhan_tin_sms_nguoi_nhan_sau_phat
        ]);

        return $response_create;
    }

    public function destroyShippingOrder(Request $request){

        $shipping_config = ShippingConfig::select('production', 'username', 'password')->first();

        //lấy link môi trường.
        $get_link = $this->configShippingController->checkEnvironmentConfig($shipping_config->production);

        //gọi hàm tạo đơn hàng
        $response_create = Http::withHeaders([
            'Content-Type' => 'application/json',
            'h-token' => $shipping_config->token
        ])->post($get_link.'/api/api/CustomerConnect/CancelOrder', [
            "OrderId" => $request->shipping_id
        ]);

        //token hết thời gian.
        if($response_create->status() != 204){

            return $response_create->status();
        }
        
        $shipping_bill = ShippingBill::where('shipping_id', $request->shipping_id)->first();
        $shipping_bill->update(['status' => 60, 'note' => $request->text_note]);
        $shipping_bill->order()->update([
            'status' => 3,
        ]);
        // $response_create = json_decode($response_create, true);
        return $response_create->status();

    }

    public function createShippingBill($order, $response_create){

        $province_send = Province::where('matinhthanh', $response_create['SenderProvinceId'])->first();
        $district_send = $province_send->district()->where('maquanhuyen', $response_create['SenderDistrictId'])->first();
        $ward_send = $district_send->ward()->where('maphuongxa', $response_create['SenderWardId'])->first();

        $province_received = Province::where('matinhthanh', $response_create['ReceiverProvinceId'])->first();
        $district_received = $province_received->district()->where('maquanhuyen', $response_create['ReceiverDistrictId'])->first();
        $ward_received = $district_received->ward()->where('maphuongxa', $response_create['ReceiverWardId'])->first();

        $send_address = $response_create['SenderAddress'].', '.$ward_send->tenphuongxa.', '.$district_send->tenquanhuyen.', '.$province_send->tentinhthanh;

        $received_address = $response_create['ReceiverAddress'].', '.$ward_received->tenphuongxa.', '.$district_received->tenquanhuyen.', '.$province_received->tentinhthanh;

        return ShippingBill::create([
            'order_id' => $order->id,
            'shipping_id' => $response_create['Id'],
            'item_code' => $response_create['ItemCode'],
            'status' => $response_create['OrderStatusId'],
            'service_name_code' => $response_create['ServiceName'],
            'shipping_name' => $response_create['PackageContent'],
            'shipping_fee_total' => $response_create['TotalFreightIncludeVatEvaluation'],
            'pickup_type' => $response_create['PickupType'] == 1 ? 'Thu gom tận nơi' : 'Gửi hàng tại bưu cục',
            'package_viewable' => $response_create['IsPackageViewable'] ? 'Cho xem hàng' : 'Không cho xem hàng',
            'send_fullname' => $response_create['SenderFullname'],
            'send_address' => $send_address,
            'send_tel' => $response_create['SenderTel'],
            'receiver_fullname' => $response_create['ReceiverFullname'],
            'receiver_address' => $received_address,
            'receiver_phone' => $response_create['ReceiverTel'],
            'origin_cod_amount' => $response_create['OriginalCodAmountEvaluation'],
            'order_amount' => $response_create['OrderAmountEvaluation'],
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 
        ]);
    }
}
