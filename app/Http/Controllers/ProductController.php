<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        if (Auth::user()->level == 1) {
            return view('public.product.index_ctv', compact('products'));
        }
        return view('public.product.index_dai_ly', compact('products'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstorfail();
        if (Auth::user()->level == 1) {
            return view('public.product.detail.product_detail_collab', compact('product'));
        }
        return view('public.product.detail.product_detail_agent', compact('product'));
    }
}
