<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::where('category_parent', 0)
            ->with('childrenCategories')
            ->get();
        return view('admin.productCategory.nganh-nhom-hang', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proCatName' => 'required|unique:product_category,name',
            'proCatCode' => 'required|unique:product_category,code',
        ], [
            'proCatName.required' => 'Tên danh mục không được để trống',
            'proCatName.unique' => 'Tên danh mục đã được sử dụng, vui lòng chọn tên khác',
            'proCatCode.required' => 'Mã danh mục không được để trống',
            'proCatCode.unique' => 'Mã danh mục đã được sử dụng, vui lòng chọn tên khác',
        ]);

        $slug = Str::slug($request->proCatName, '-');

        ProductCategory::create([
            'category_parent' => $request->proCatParent == null ? '0' : $request->proCatParent,
            'typeof_category' => $request->proCatType,
            'slug' => $slug,
            'name' => $request->proCatName,
            'code' => $request->proCatCode,
            'description' => $request->proCatDescription
        ]);

        return redirect()->route('nganh-nhom-hang.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proCatName' => 'required|unique:product_category,name,'.$id,
            'proCatCode' => 'required|unique:product_category,code,'.$id,
        ], [
            'proCatName.required' => 'Tên danh mục không được để trống',
            'proCatName.unique' => 'Tên danh mục đã được sử dụng, vui lòng chọn tên khác',
            'proCatCode.required' => 'Mã danh mục không được để trống',
            'proCatCode.unique' => 'Mã danh mục đã được sử dụng, vui lòng chọn tên khác',
        ]);

        $slug = Str::slug($request->proCatName, '-');

        ProductCategory::where('id', $id)->update([
            'category_parent' => $request->proCatParent == null ? '0' : $request->proCatParent,
            'typeof_category' => $request->proCatType,
            'slug' => $slug,
            'name' => $request->proCatName,
            'code' => $request->proCatCode,
            'description' => $request->proCatDescription
        ]);
        return redirect()->route('nganh-nhom-hang.index');

    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $proCat = ProductCategory::where('id', $id)->first();
        $returnHTML = view('admin.productCategory.formUpdate', compact('proCat', 'id'))->render();

        return response()->json([
            'html' => $returnHTML
        ], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        ProductCategory::where('id', $id)->update([
            'status' => $request->unitStatus
        ]);

        return redirect()->route('nganh-nhom-hang.index');
    }

    public function destroy($id)
    {
        ProductCategory::destroy($id);
        return redirect()->route('nganh-nhom-hang.index');
    }

    public function getCategory(Request $request)
    {
        $cates = ProductCategory::where('typeof_category', ($request->type-1))->get();
        return response()->json([
            'data' => $cates,
        ], 200);
    }

}
