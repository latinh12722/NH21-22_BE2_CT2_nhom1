<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protype;
use App\Models\Product;
use App\Models\Manufacture;

class Store extends Controller
{

    function show_manuid($manu_id)
    {
        $data = Product::where('manu_id', $manu_id)->get();
        $protypes = Protype::all();
        return view('store', ['data' => $data]);
    }
    function show_typeid($type_id)
    {
        $data = Product::where('type_id', $type_id)->get();
        if (count(Protype::where('type_id', $type_id)->get()) > 0) {
            return view('store', ['data' => $data]);
        }
        return view('errors.illustrated-layout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('store', ['data' => $data]);
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