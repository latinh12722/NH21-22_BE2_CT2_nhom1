<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Manufacture;
use App\Models\Protype;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class Product_detail extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function getproduct(Request $request)
    {
        $id = $request->get('productId');
        $product = Product::where('product_id',$id)->first();
        return $product;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $products = new Product;
        $product = Product::where('product_id',$id)->get();
        // $product = DB::select('SELECT * FROM products where product_id = ?',[$id]);
        if (count($product) > 0) {
            return view('customer.product',['product'=>$product[0]]);
        }
        // return view('errors.illustrated-layout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
