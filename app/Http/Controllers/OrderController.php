<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\Order;
use App\Models\cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders=Order::with('meals');

        if($request->from_date){
            $orders=$orders->WhereDate('created_at','>',$request->from_date);
        }
        if($request->to_date){
            $orders=$orders->WhereDate('created_at','<=',$request->to_date);
        }
        if($request->customer_id){
            $orders=$orders->Where('customer_id',$request->customer_id);
        }
        if($request->state){
            $orders=$orders->where('state' , $request->state);
        }


        $orders= $orders->get();
        $customers=Customer::all();
        return view('order.index',compact('orders','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id=\Auth::user()->customer->id;
      
        $order->state='wait';
       
        $order->save();
        $carts =Cart::where('customer_id',\Auth::user()->customer->id)->get();
        foreach($carts as $cart){
        $order->meals()->attach($cart->meal_id,['quantity' => $cart->quantity, 'price' =>$cart->meal->price]);
        $cart->delete();
        }
        return redirect()->back()->with('success','تمت اضافة الطلبية بنجاح');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
    
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
   
    
    public function changeState(Request $request){
        try{
        $order=Order::find($request->id);
        $order->update(['state'=>$request->state]);

        return response()->json(['state'=>true,'message'=>'updateed menu successfuy'],200);
     }catch(\Exception $e){
        return response()->json(['state'=>false, 'message'=>$e->getMessage()],500);
     }

    }
    
  
    }

