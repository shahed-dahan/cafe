<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
    $booking = new Booking();
    $booking->table_number = $request->table_number;
    $booking->reservation_date = $request->reservation_date;
    $booking->reservation_time = $request->reservation_time;
    $booking->save();
}
}
