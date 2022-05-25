<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('admin.products', ['data' => $products]);
    }
    function show_add_product()
    {
        return view('admin.addproduct');
    }
    function show_edit_product(Request $request)
    {
        $id = $request->get('product_id');
        $product = Product::where('product_id', $id)->first();
        return view('admin.editproduct', ['product' => $product]);
    }
}
