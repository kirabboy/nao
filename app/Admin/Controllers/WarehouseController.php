<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        $products = Product::all();
        $index = 1;
        return view('admin.warehouse.ton-kho-dai-ly', compact('warehouses', 'index', 'products'));
    }

    public function getProduct()
    {

    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $product = Product::find($request->product);

                if($request->product == "" || $request->product == '-1' || $product == null) {
                    throw new \Exception('Vui lòng chọn đúng sản phẩm');
                }
                $warehouse = Warehouse::create([
                    'code' => $request->warehouseCode,
                    'name' => $request->warehouseName,
                    'address' => $request->warehouseAddress,
                ]);


                DB::table('warehouse_product')->insert([
                    'warehouse_id' => $warehouse->id,
                    'product_id' => $request->product,
                    'quantity' => $request->productQuantity,
                ]);
                return redirect()->route('warehouse.index')->with('success', 'Tạo kho hàng thành công');
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra vui lòng thử lại']);
            }
        });
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
