<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CalculationUnit;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.san-pham', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nganhHang = ProductCategory::where('typeof_category', 0)->get();
        $calculationUnits = CalculationUnit::all();
        $brands = Brand::all();
        return view('admin.product.tao-san-pham', compact('nganhHang', 'calculationUnits', 'brands'));
    }

    public function getCategory(Request $request)
    {
        $cate = ProductCategory::where('category_parent', $request->id)
                                ->get();
        return response()->json([
            'data' => $cate,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $slug = Str::slug($request->product_name, '-');

                $product = Product::create([
                    'sku' => $request->product_sku,
                    'name' => $request->product_name,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'gallery' => rtrim($request->gallery_img, ", "),
                    'category_id' => $request->child_category != "-1" ? $request->category_parent : $request->child_category,
                    'calculation_unit' => $request->product_calculation_unit,
                    // 'quantity' => $request->product_quantity,
                    'weight' => $request->product_weight,
                    'height' => $request->product_height,
                    'width' => $request->product_width,
                    'length' => $request->product_length,
                    'brand' => $request->product_brand,
                    'status' => $request->product_status,
                    'short_desc' => $request->short_description,
                    'long_desc' => $request->description,
                ]);

                $productPrice = new ProductPrice();
                $productPrice->regular_price = $request->product_regular_price;
                $productPrice->vpoint_retail = $request->product_vpoint;
                $productPrice->vpoint_2_star = $request->product_discount_2;
                $productPrice->vpoint_1_star = $request->product_discount_1;
                $productPrice->vpoint_platinum = $request->product_discount_platinum;
                $productPrice->vpoint_diamond = $request->product_discount_diamond;
                $productPrice->vpoint_gold = $request->product_discount_gold;
                $productPrice->vpoint_silver = $request->product_discount_silver;
                $productPrice->vpoint_member = $request->product_discount_member;

                $product->productPrice()->save($productPrice);

                return redirect()->route('san-pham.edit', $product->id)->with('success', 'Cập nhật sản phẩm thành công');
            } catch (\Throwable $th) {
                throw new \Exception('Đã có lỗi xảy ra vui lòng thử lại');
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        });
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $nganhHang = ProductCategory::where('typeof_category', 0)->get();
        $calculationUnits = CalculationUnit::all();
        $brands = Brand::all();
        return view('admin.product.cap-nhat-san-pham', compact('product', 'nganhHang', 'calculationUnits', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            try {
                $slug = Str::slug($request->product_name, '-');

                Product::where('id', $id)->update([
                    'sku' => $request->product_sku,
                    'name' => $request->product_name,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'gallery' => rtrim($request->gallery_img, ", "),
                    'category_id' => $request->child_category == "-1" ? $request->category_parent : $request->child_category,
                    'calculation_unit' => $request->product_calculation_unit,
                    // 'quantity' => $request->product_quantity,
                    'weight' => $request->product_weight,
                    'height' => $request->product_height,
                    'width' => $request->product_width,
                    'length' => $request->product_length,
                    'brand' => $request->product_brand,
                    'status' => $request->product_status,
                    'short_desc' => $request->short_description,
                    'long_desc' => $request->description,
                ]);


                ProductPrice::where('id_ofproduct', $id)->update([
                    'regular_price' => $request->product_regular_price,
                    'vpoint_retail' => $request->product_vpoint,
                    'vpoint_2_star' => $request->product_discount_2,
                    'vpoint_1_star' => $request->product_discount_1,
                    'vpoint_platinum' => $request->product_discount_platinum,
                    'vpoint_diamond' => $request->product_discount_diamond,
                    'vpoint_gold' => $request->product_discount_gold,
                    'vpoint_silver' => $request->product_discount_silver,
                    'vpoint_member' => $request->product_discount_member,
                ]);

                return redirect()->route('san-pham.edit', $id)->with('success', 'Cập nhật sản phẩm thành công');
            } catch (\Throwable $th) {
                throw new \Exception('Đã có lỗi xảy ra vui lòng thử lại');
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('san-pham.index');
    }
}
