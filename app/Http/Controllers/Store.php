<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protype;
use App\Models\Product;
use App\Models\Manufacture;

class Store extends Controller
{

    function show_manuid($manu_id, Request $request)
    {
        $data['products'] = Product::where('manu_id', $manu_id);
        if ($request->get('orderby') == 'new') {
            $data['products'] = $data['products']->orderBy('product_id', 'ASC');
            $data['products'] = $data['products']->orderBy('product_feature', 'DESC');
        }
        if ($request->get('orderby') == 'sale') {
            $data['products'] = $data['products']->orderBy('product_sale', 'DESC');
        }
        if ($request->get('orderby') == 'price_max') {
            $data['products'] = $data['products']->orderBy('product_price', 'DESC');
        }
        if ($request->get('orderby') == 'price_min') {
            $data['products'] = $data['products']->orderBy('product_price', 'ASC');
        }
        if ($request->get('brand')) {
            $data['products'] = $data['products']->where('manu_id', $request->get('brand'));
        }
        if ($request->get('category')) {
            $data['products'] = $data['products']->where('type_id', $request->get('category'));
        }
        if ($request->get('price_max')) {
            $data['products'] = $data['products']->where('product_price', '<', $request->get('price_max'));
        }
        if ($request->get('price_min')) {
            $data['products'] = $data['products']->where('product_price', '>', $request->get('price_min'));
        }
        $data['products'] = $data['products']->Paginate(9);
        return view('customer.store', $data);
    }
    function show_typeid($type_id, Request $request)
    {
        $data['products'] = Product::where('type_id', $type_id);
        if ($request->get('orderby') == 'new') {
            $data['products'] = $data['products']->orderBy('product_id', 'ASC');
            $data['products'] = $data['products']->orderBy('product_feature', 'DESC');
        }
        if ($request->get('orderby') == 'sale') {
            $data['products'] = $data['products']->orderBy('product_sale', 'DESC');
        }
        if ($request->get('orderby') == 'price_max') {
            $data['products'] = $data['products']->orderBy('product_price', 'DESC');
        }
        if ($request->get('orderby') == 'price_min') {
            $data['products'] = $data['products']->orderBy('product_price', 'ASC');
        }
        if ($request->get('brand')) {
            $data['products'] = $data['products']->where('manu_id', $request->get('brand'));
        }
        if ($request->get('category')) {
            $data['products'] = $data['products']->where('type_id', $request->get('category'));
        }
        if ($request->get('price_max')) {
            $data['products'] = $data['products']->where('product_price', '<', $request->get('price_max'));
        }
        if ($request->get('price_min')) {
            $data['products'] = $data['products']->where('product_price', '>', $request->get('price_min'));
        }
        $data['products'] = $data['products']->Paginate(9);
        return view('customer.store', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['products'] = Product::where('product_description', 'like', '% %');
        if ($request->get('orderby') == 'new') {
            $data['products'] = $data['products']->orderBy('product_id', 'ASC');
            $data['products'] = $data['products']->orderBy('product_feature', 'DESC');
        }
        if ($request->get('orderby') == 'sale') {
            $data['products'] = $data['products']->orderBy('product_sale', 'DESC');
        }
        if ($request->get('orderby') == 'price_max') {
            $data['products'] = $data['products']->orderBy('product_price', 'DESC');
        }
        if ($request->get('orderby') == 'price_min') {
            $data['products'] = $data['products']->orderBy('product_price', 'ASC');
        }
        if ($request->get('brand')) {
            $data['products'] = $data['products']->where('manu_id', $request->get('brand'));
        }
        if ($request->get('category')) {
            $data['products'] = $data['products']->where('type_id', $request->get('category'));
        }
        if ($request->get('price_max')) {
            $data['products'] = $data['products']->where('product_price', '<', $request->get('price_max'));
        }
        if ($request->get('price_min')) {
            $data['products'] = $data['products']->where('product_price', '>', $request->get('price_min'));
        }

        $data['products'] = $data['products']->Paginate(9);
        return view('customer.store', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $data['products'] = Product::where([['product_name', 'LIKE', "%{$keyword}%"], ['product_description', 'LIKE', "%{$keyword}%"]]);
        if ($request->input('type_id')) {
            $type_id = $request->input('type_id');
            if ($type_id != -1) {
                $data['products'] = $data['products']->where('type_id', $type_id);
            }
        }
        if ($request->get('orderby') == 'new') {
            $data['products'] = $data['products']->orderBy('product_id', 'ASC');
            $data['products'] = $data['products']->orderBy('product_feature', 'DESC');
        }
        if ($request->get('orderby') == 'sale') {
            $data['products'] = $data['products']->orderBy('product_sale', 'DESC');
        }
        if ($request->get('orderby') == 'price_max') {
            $data['products'] = $data['products']->orderBy('product_price', 'DESC');
        }
        if ($request->get('orderby') == 'price_min') {
            $data['products'] = $data['products']->orderBy('product_price', 'ASC');
        }
        if ($request->get('brand')) {
            $data['products'] = $data['products']->where('manu_id', $request->get('brand'));
        }
        if ($request->get('category')) {
            $data['products'] = $data['products']->where('type_id', $request->get('category'));
        }
        if ($request->get('price_max')) {
            $data['products'] = $data['products']->where('product_price', '<', $request->get('price_max'));
        }
        if ($request->get('price_min')) {
            $data['products'] = $data['products']->where('product_price', '>', $request->get('price_min'));
        }
        $data['products'] = $data['products']->Paginate(9);
        return view('customer.store', $data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
