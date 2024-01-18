<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Meal;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $cart = new Cart();
        // dd($request->input);
     
       
        $cart->meal_id=$request->meal;
        $cart->quantity=$request->quantity;
        $cart->customer_id=\Auth::user()->customer->id;
        $cart->save();
        return redirect()->back()->with('success','تمت الاضافة بنجاح');

    }
    public function show(){
        $carts=Cart::where('customer_id',\Auth::user()->customer->id)->get();
        return view('UserViews.cart',compact('carts'));
    }
    public function destroy($id)
    {
        $cart=cart::find($id);
       
        $cart->delete();

        return redirect('cart')
            ->with('success','cart delete successfully.');
    }
}
