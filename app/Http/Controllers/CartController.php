<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function index(Request $request)
    {
        Session::forget('rowids');
        $cart = Cart::instance('shopping');
        return view('public.cart.index', compact('cart'));
    }

    public function addCart(Request $request)
    {
        $user = Auth::user();
        $product_id = $_POST['product_id'];
        $product = Product::whereId($product_id)->firstOrFail();
        Cart::instance('shopping')->add(['id' => $product->id, 'name' => $product->name, 'price' => getPriceOfLevel($user, $product->productPrice()->first()), 'qty' => 1])->associate('App\Models\Product');
        return response()->json([
            true
        ], 200);
    }

    public function updateCart(Request $request)
    {
        $rowid = $_POST['rowid'];
        $qty = $_POST['qty'];
        Cart::instance('shopping')->update($rowid, ['qty' => $qty]);
        return response()->json([
            formatPrice(Cart::instance('shopping')->get($rowid)->price * $qty)
        ], 200);
    }

    public function updateCheckout(Request $request)
    {
        $rowids = $request->rowids;
        $subtotal = 0;
        if (!$rowids) {
            return response()->json([
                formatPrice(0),
                ''
            ], 200);
        } else {
            foreach ($rowids as $rowid) {
                $subtotal += Cart::instance('shopping')->get($rowid)->price * Cart::instance('shopping')->get($rowid)->qty;
            }
            return response()->json([
                formatPrice($subtotal),
                implode(',', $rowids)
            ], 200);
        }
    }

    public function toCheckout(Request $request)
    {
        $rowids = $request->rowids;
        Session::put('rowids', $rowids);
        return redirect()->route('checkout.index');
    }
}
