<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\Order;
use App\Models\CalculationUnit;

class ExportPDF extends Controller
{
    //
    public function index(){
    	return view('admin.pdf.index');
    }
    public function export(Order $order){
        $order = $order->load(['order_info:id,id_order,fullname,phone', 'products' => function ($q){
            $q->with('productCalculationUnit:id,name');
        }, 'order_address' => function ($query){
            $query->with('province', 'district', 'ward');
        }]);
        $pdf = PDF::loadHTML(view('admin.pdf.index')->with('order', $order)->render());
    	$pdf->setPaper('a3', 'landscape');
        return $pdf->stream();
        return $pdf->download('phieugiaohang.pdf');
    }
}
