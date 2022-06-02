<?php

namespace App\Helpers;

use App\Models\Bill;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;
use PDO;

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
    function getAllBills(){
        return Bill::all();
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
        } else {
            return $url;
        }
    }
    function return_active_navbar($type_id, $url)
    {
        $key = (new \App\Helpers\Helper)->getvalue_url($url);
        if ($key == $type_id) {
            return 'active';
        }
    }
    public function cardArray()
    {
        $cardCollection = \Gloudemans\Shoppingcart\Facades\Cart::getContent();
        return $cardCollection->toArray();
    }
    function getproductbyid($id)
    {
        return Product::where('product_id', $id)->first();
    }
    function total_arraycard()
    {
        $cardCollection = \Gloudemans\Shoppingcart\Facades\Cart::getContent();
        $tong = 0;
        foreach ($cardCollection as $value) {
            $tong += $value->price * $value->quantity;
        }
        return $tong;
    }
    function selected_combobox($id_product, $id)
    {
        if ($id_product  == $id) {
            echo 'selected';
        }
    }

    function gettopsellingforManu($manu_id)
    {
        $products = Product::where('manu_id', $manu_id)->orderBy('product_sale', 'DESC')->take(6)->get();
        return $products;
    }
    function gettopsellingforProduct()
    {
        $products = Product::orderBy('product_sale', 'DESC')->take(8)->get();
        return $products;
    }
    function check_wishlist($product_id)
    {
        if (Auth::check()) {
            if (count(Wishlists::where('id', Auth::user()->id)->where('product_id', $product_id)->get()) > 0) {
                return 'fa fa-heart';
            }
        }
        return 'fa fa-heart-o';
    }
    function substring_name($name)
    {
        if (strlen($name) > 100) {
            return substr($name, 0, 50) . "...";
        }
        return $name;
    }
    function getCountCommentByProductId($rating, $product_id)
    {
        return count(Comment::where('product_product_id', $product_id)->where('rating', $rating)->get());
    }
    function rating_percentage($product_id)
    {
        $star1 = (new \App\Helpers\Helper)->getCountCommentByProductId(1, $product_id);
        $star2 = (new \App\Helpers\Helper)->getCountCommentByProductId(2, $product_id);
        $star3 = (new \App\Helpers\Helper)->getCountCommentByProductId(3, $product_id);
        $star4 = (new \App\Helpers\Helper)->getCountCommentByProductId(4, $product_id);
        $star5 = (new \App\Helpers\Helper)->getCountCommentByProductId(5, $product_id);
        $count_arr = count(Comment::where('product_product_id', $product_id)->get()) > 0 ? count(Comment::where('product_product_id', $product_id)->get()) : 0;
        if ($count_arr == 0){
            return number_format(5, 2);
        }
        $cal = ($star1 * 1 + $star2 * 2 + $star3 * 3 + $star4 * 4 + $star5 * 5) / $count_arr;
        return number_format($cal, 2);
    }
    function getTotalStar($product_id){
        return count(Comment::where('product_product_id', $product_id)->get());
    }
    function getRatingStar($rating, $product_id){
        $star = count(Comment::where('product_product_id', $product_id)->where('rating', $rating)->get());
        $total = count(Comment::where('product_product_id', $product_id)->get());
        if($total == 0){
            return 0;
        }
        return ($star / $total)*100;
    }
    function str_getRatingStar($rating, $product_id){
        return '<div style="width: '.(new \App\Helpers\Helper)->getRatingStar($rating, $product_id).'%;"></div>';
    }
}
