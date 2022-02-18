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
        $products = Product::latest()->get();
        return view('admin.product.san-pham', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nganhHang = ProductCategory::select('id', 'name')->whereCategory_parent(0)->get();
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
        $request->validate([
            'product_sku' => 'required|unique:products,sku',
            'product_name' => 'required|unique:products,name',
            'slug' => 'unique:products,slug',
            'feature_img' => 'required',
            'product_weight' => 'required',
            'product_height' => 'required',
            'product_width' => 'required',
            'product_length' => 'required',
            'product_brand' => 'required',
            'product_status' => 'required',
        ], [
            'product_sku.required' => 'SKU không được để trống',
            'product_sku.unique' => 'SKU đang sử dụng đã bị trùng lặp',
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.unique' => 'Tên sản phẩm đã bị trùng lặp, vui lòng đặt tên khác',
            'slug.unique' => 'Slug đang sử dụng đã bị trùng lặp, vui lòng đặt tên khác',
            'feature_img' => 'Ảnh đại diện không được để trống',
            'product_weight' => 'Cân nặng không được để trống',
            'product_height' => 'Chiều cao không được để trống',
            'product_width' => 'Chiều rộng không được để trống',
            'product_length' => 'Chiều dài không được để trống',
            'product_brand' => 'Thương hiệu không được để trống',
            'product_status' => 'Trạng thái không được để trống',
        ]);

        return DB::transaction(function () use ($request) {
            try {
                $slug = Str::slug($request->product_name, '-');

                $product = Product::create([
                    'sku' => $request->product_sku,
                    'name' => $request->product_name,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'gallery' => rtrim($request->gallery_img, ", "),
                    'category_id' => $request->child_category == '-1' ? $request->category_parent : $request->child_category,
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
                $productPrice->price_ctv = $request->price_ctv;
                $productPrice->price_new_daily = $request->price_new_daily;
                $productPrice->price_daily_chuan = $request->price_daily_chuan;
                $productPrice->price_vip = $request->price_vip;
                $productPrice->nao_point = $request->nao_point;

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
        $product = Product::with('productCategory', 'productCalculationUnit', 'productBrand', 'productPrice')->whereId($id)->first();
        // dd($product);
        $category_parent_id = optional($product->productCategory)->typeof_category == 0 ? optional($product->productCategory)->id :  optional($product->productCategory)->category_parent;
        $nganhHang = ProductCategory::where('typeof_category', 0)->get();

        $nhomhang = ProductCategory::where('category_parent', $category_parent_id)->get();

        $calculationUnits = CalculationUnit::all();
        $brands = Brand::all();
        return view('admin.product.cap-nhat-san-pham', compact('product', 'nganhHang', 'calculationUnits', 'brands', 'nhomhang', 'category_parent_id'));
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
        $request->validate([
            'product_sku' => 'required|unique:products,sku,'.$id,
            'product_name' => 'required|unique:products,name,'.$id,
            'slug' => 'unique:products,slug',
            'feature_img' => 'required',
            'product_weight' => 'required',
            'product_height' => 'required',
            'product_width' => 'required',
            'product_length' => 'required',
            'product_brand' => 'required',
            'product_status' => 'required',
        ], [
            'product_sku.required' => 'SKU không được để trống',
            'product_sku.unique' => 'SKU đang sử dụng đã bị trùng lặp',
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.unique' => 'Tên sản phẩm đã bị trùng lặp, vui lòng đặt tên khác',
            'slug.unique' => 'Slug đang sử dụng đã bị trùng lặp, vui lòng đặt tên khác',
            'feature_img' => 'Ảnh đại diện không được để trống',
            'product_weight' => 'Cân nặng không được để trống',
            'product_height' => 'Chiều cao không được để trống',
            'product_width' => 'Chiều rộng không được để trống',
            'product_length' => 'Chiều dài không được để trống',
            'product_brand' => 'Thương hiệu không được để trống',
            'product_status' => 'Trạng thái không được để trống',
        ]);

        return DB::transaction(function () use ($request, $id) {
            try {
                $slug = Str::slug($request->product_name, '-');

                Product::where('id', $id)->update([
                    'sku' => $request->product_sku,
                    'name' => $request->product_name,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'gallery' => rtrim($request->gallery_img, ", "),
                    'category_id' => $request->category_child == "-1" ? $request->category_parent : $request->category_child,
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
                    'price_ctv' => $request->price_ctv,
                    'price_new_daily' => $request->price_new_daily,
                    'price_daily_chuan' => $request->price_daily_chuan,
                    'price_vip' => $request->price_vip,
                    'nao_point' => $request->nao_point,
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
