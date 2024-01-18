<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(){
        return view('booking.create');
    }
    public function store(Request $request)
    {
        // dd($request->input());
    $booking = new Booking();
    $booking->name = $request->name;
    $booking->email = $request->email;
    $booking->phone = $request->phone;
    $booking->table_number = $request->table_number;
    $booking->state = $request->state;
    $booking->date = $request->date;
    $booking->time = $request->time;
    $booking->save();
    return redirect()->back()->with('success','تمت الاضافة بنجاح');
}
public function index(Request $request){
    $booking=Booking::all();
    if($request->state){
        $booking=Booking::where('state',$request->state)->get();
    }
    return view('booking.index',compact('booking'));
    
}
public function edit($id){
    $booking=Booking::find($id);
    return view('booking.edit',compact('booking'));
}
public function destroy($id)
{
    $booking=Booking::find($id);
 
    $booking->delete();

    return redirect('booking-index')
        ->with('success','booking delete successfully.');
}
}
