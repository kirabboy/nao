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
    public function index(Order $order){
    	return view('admin.pdf.index', compact('order'));
    }
    public function export(Order $order){
        $order = $order->load(['order_info:id,id_order,fullname,phone', 'warehouse', 'products' => function ($q){
            $q->with('productCalculationUnit:id,name');
        }, 'order_address' => function ($query){
            $query->with('province', 'district', 'ward');
        }]);
        // dd($order);
        // $pdf = PDF::loadHTML(view('admin.pdf.index')->with('order', $order)->render());
        $pdf = PDF::loadView('admin.pdf.index', compact('order'));
        // $pdf = PDF::loadView('admin.pdf.test');
        // dd($pdf);
    	$pdf->setPaper('a3', 'landscape');
        return $pdf->stream();
        return $pdf->download('phieugiaohang.pdf');
    }
}
