<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 
    public function index()
    {
        $user = Auth::user();
        $products = Product::latest()->get();
        switch ($user->level){
            case 1:
                return view('public/product/index_ctv', compact('products'));
                break;
            default:
                return view('public/product/index_dai_ly', compact('products'));
                break;
        }
    }


    public function show($slug)
    {
        $user = Auth::user();
        $product = Product::whereSlug($slug)->first();
        switch ($user->level){
            case 1:
                return view('public.product.detail.product_detail_collab', compact('product'));        
                break;
            default:
                return view('public.product.detail.product_detail_agent', compact('product'));        
                break;
        }
    }
}
