<?php

namespace App\Helpers;

use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Protype;

class Helper
{
    function getAllProducts()
    {
        return Product::all();
    }
    function getAllProtypes()
    {
        return Protype::all();
    }
    function getAllManu()
    {
        return Manufacture::all();
    }
    function getRelatedProducts($product_id)
    {
        $product = Product::where('product_id', $product_id)->get()[0];
        return Product::where('type_id', $product->type_id)
            ->where('product_id', '!=', $product->product_id)
            ->orWhere('manu_id', $product->manu_id)
            ->where('product_id', '!=', $product->product_id)->take(4)->get();
    }

    function getmanu_byid($manu_id)
    {
        return Manufacture::where('manu_id', $manu_id)->get()[0];
    }
    function gettype_byid($type_id)
    {
        return Protype::where('type_id', $type_id)->get()[0];
    }
    function getselectarr_manu($array)
    {
        $arr = [];
        foreach (Manufacture::all() as $value_manu) {
            foreach ($array as $value_arr) {
                if ($value_arr->manu_id == $value_manu->manu_id) {
                    if (isset($arr[$value_manu->manu_id])) {
                        $arr[$value_manu->manu_id] += 1;
                    } else {
                        $arr[$value_manu->manu_id] = 1;
                    }
                }
            }
        }
        return $arr;
    }
    function getselectarr_type($array)
    {
        $arr = [];
        foreach (Protype::all() as $value_type) {
            foreach ($array as $value_arr) {
                if ($value_arr->type_id == $value_type->type_id) {
                    if (isset($arr[$value_type->type_id])) {
                        $arr[$value_type->type_id] += 1;
                    } else {
                        $arr[$value_type->type_id] = 1;
                    }
                }
            }
        }
        return $arr;
    }
    function getthreetopselling()
    {
        return Product::orderBy('product_sale', 'DESC')->take(3)->get();
    }
    public function getvalue_url($url)
    {
        $url = explode("?", $url)[0];
        $url = explode("/", $url);

        $count_arr = count($url);
        
        $url = $url[$count_arr - 1];
        if (!ctype_digit($url)) {
            return -1;
        }
        else{
            return $url;
        }

    }
    function return_active_navbar($type_id, $url)
    {
        $key = (new \App\Helpers\Helper)->getvalue_url($url);
        if ($key == $type_id){
            return 'active';
        }
    }
    public function cardArray()
    {
        $cardCollection = \Gloudemans\Shoppingcart\Facades\Cart::getContent();
        return $cardCollection->toArray();
    }
    function getproductbyid($id){
        return Product::where('product_id',$id)->first();
    }
    function total_arraycard(){
        $cardCollection = \Gloudemans\Shoppingcart\Facades\Cart::getContent();
        $tong = 0;
        foreach($cardCollection as $value){
            $tong += $value->price * $value->quantity;
        }
        return $tong;
    }
}
