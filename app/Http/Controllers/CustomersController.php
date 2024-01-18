<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->customer)
        return redirect('/menu');
    else
        return view('UserViews.createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'user_id' => ['required', 'unique:customers,user_id'],
        ]);
        $customer=Customer::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'user_id' => \Auth::user()->id,
            'state' => 1
        ]);
        // $customer=Customer::firstOrCreate([
        //     'user_id' => \Auth::user()->id,
        // ],
        // [
        //     'customer_name' => $request->customer_name,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'state' => 1
        // ]); 
        // if we have customer with current user id it gives the customer otherwise it create new one
       
       
        $customer=Customer::firstOrNew([
                'user_id' => \Auth::user()->id,
            ]);
            
                $customer->customer_name = $request->customer_name;
                $customer->phone =$request->phone;
                $customer->address = $request->address;
                $customer->state = 1;
             $customer->save(); 
            // if doesn't find the object with current user id it return new object of model

        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function userAdmin($id){
        $user=User::find($id);
        if($user->is_admin==1){
            $user->update(['is_admin'=>0]);
        }else{
            $user->update(['is_admin'=>1]);
        }
        return $user->is_admin;
    }
}
