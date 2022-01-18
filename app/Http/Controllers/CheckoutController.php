<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
        if(Session::has('rowids')){
            $rowids = Session::get('rowids');
            $cart = Cart::instance('shopping');
            $subtotal = 0;
            foreach(explode(',',$rowids) as $rowid){
                $subtotal += Cart::instance('shopping')->get($rowid)->price *Cart::instance('shopping')->get($rowid)->qty; 
            }
            return view('public.checkout.index', compact('rowids', 'cart', 'subtotal'));
        }else{
            return redirect()->route('cart.index');
        }
    }
}
