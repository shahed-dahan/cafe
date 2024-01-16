<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
   public $table="booking";
    protected $fillable = ['table_number', 'reservation_date', 'reservation_time'];
}
