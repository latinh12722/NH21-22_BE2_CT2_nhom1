<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Manufacture;
use App\Models\Protype;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\Wishlists;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // return view('customer.index', ['data' => $products]);
        $newproducts = Product::where('product_feature',1)->orderBy('product_id', 'DESC')->take(10)->get();
        $topselling = Product::orderBy('product_sale', 'DESC')->take(8)->get();
        // $Allprotypes = Protype::orderBy('protype_', 'DESC')->take(8)->get();
        return view('customer.index',['newproducts' => $newproducts,'topselling' => $topselling]);
    }
    function getAllproducts()
    {
    }
    function getnewproduct($number)
    {
        $newproducts = [];
        if ($number == 1) {
            $newproducts = Product::where('type_id', '1')->orderBy('product_id', 'DESC')->take(10)->get();
        }
        if ($number == 2) {
            $newproducts = Product::where('type_id', '2')->orderBy('product_id', 'DESC')->take(10)->get();
        }
        $newproducts = Product::whereNotIn('type_id', [1, 2])->orderBy('product_id', 'DESC')->take(10)->get();
        return view('customer.index', ['newproducts' => $newproducts]);
    }
    function getAccessories($number){
        $newproducts = [];
        if ($number == 1) {
            $newproducts = Product::where('type_id', '1')->orderBy('product_id', 'DESC')->take(10)->get();
        }
        if ($number == 2) {
            $newproducts = Product::where('type_id', '2')->orderBy('product_id', 'DESC')->take(10)->get();
        }
        $newproducts = Product::whereNotIn('type_id', [1, 2])->orderBy('product_id', 'DESC')->take(10)->get();
        return $newproducts;
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
        echo $id;
        return view('customer.store');
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




    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new SendMail());
        return redirect()->back()->with('success', 'Email Sent!');
    }

    function addwishlist($product_id){
        if(Auth::check()){
            $wishlist = new Wishlists;
            $wishlist->product_id = $product_id;
            User::find(Auth::user()->id)->wishlists()->save($wishlist);
        }
        return redirect()->back();
    }
}
