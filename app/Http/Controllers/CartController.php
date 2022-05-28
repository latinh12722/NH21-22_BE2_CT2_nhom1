<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first();
        if (!isset(Cart::get($product->product_id)->quantity)) {
            Cart::add(
                $product->product_id,
                $product->product_name,
                $product->product_price - $product->product_price * $product->product_sale / 100,
                $request->input('quantity')
            );
        } else {
            Cart::update($product->product_id, 1);
        }
        return redirect()->back();
    }
    public function removecart(Request $request){
        $id = $request->id;
        Cart::remove($id);
        return redirect()->back();
    }
    function output_quantity_cart(){
        
    }
    function showviewcart(){
        if (Cart::getTotalQuantity()){
            return view('customer.viewcart');
        }
        return redirect()->back();
    }
}
