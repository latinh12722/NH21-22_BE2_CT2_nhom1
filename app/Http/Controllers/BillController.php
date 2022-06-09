<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::getTotalQuantity() > 0) {
            return view('customer.checkout');
        }
        return redirect()->back();
    }
    function addbill(Request $request)
    {
        $fullname = $request->input('last-name') . $request->input('first-name');
        $email = $request->input('email');
        $address = $request->input('address') . $request->input('city') . "(" . $request->input('country') . ")";
        $phone = $request->input('tel');
        $ordernotes = $request->input('ordernotes');
        $bill = new Bill;
        $bill->name = $fullname;
        $bill->email = $email;
        $bill->address = $address;
        $bill->phone = $phone;
        $bill->order_note = $ordernotes;
        
        if (isset(Auth::user()->role)) {
            User::find(Auth::user()->id)->bills()->save($bill);
            foreach (Cart::getContent() as $cart){
                $bill->products()->attach($cart->id,['quantity'=>$cart->quantity]);
            }
            Cart::clear();
            return Redirect::route('bill.bought');
        } else {
            $bill->save();
            foreach (Cart::getContent() as $cart){
                $bill->products()->attach($cart->id,['quantity'=>$cart->quantity]);
            }
            Cart::clear();
            return Redirect::route('customer.index');
        }
    }


    function bought()
    {
        if (isset(Auth::user()->role)) {
            $bills = User::find(Auth::user()->id)->bills;
            return view('customer.bills', ['bills' => $bills]);
        }
        return Redirect() - back();
    }

    function bought_bill_id($bill_id,Request $request)
    {
        if (isset(Auth::user()->role)) {
            $bill = Bill::where('id', $bill_id)->where('user_id', Auth::user()->id)->first();
            return view('customer.bill', ['bill' => $bill]);
        }
        return Redirect() - back();
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
        if (Auth::check()) {
            $bills = Bill::all();
            return view('customer.bills', ['data' => $bills]);
        }
        return redirect()->back();
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
    public function Placeorder(Request $request, $id)
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
