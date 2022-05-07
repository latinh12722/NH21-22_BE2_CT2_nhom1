<?php

namespace App\Helpers;

use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Protype;

class Helper
{
    public static function getnumber()
    {
        return 10;
    }
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
    function getRelatedProducts($product_id){
        $product = Product::where('product_id',$product_id)->get()[0];
        return Product::where('type_id',$product->type_id)
        ->where('product_id', '!=' , $product->product_id)
        ->orWhere('manu_id',$product->manu_id)
        ->where('product_id', '!=' , $product->product_id)->take(4)->get();
    }
}
