<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index_daily() {
        $products = Product::latest()->get();
        return view('public.product.index_dai_ly', compact('products'));
    }

    public function index_ctv() {
        $products = Product::latest()->get();
        return view('public.product.index_ctv', compact('products'));
    }

    public function detail_daily($slug) 
    {
        $product = Product::where('slug', $slug)->firstorfail();
        return view('public.product.detail.product_detail_agent', compact('product'));
    }

    public function detail_ctv($slug) 
    {
        $product = Product::where('slug', $slug)->firstorfail();
        return view('public.product.detail.product_detail_collab', compact('product'));
    }
}
