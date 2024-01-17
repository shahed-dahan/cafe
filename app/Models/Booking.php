<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;
   public $table="booking";
   public $incrementing=false;
   public $timestamps = false;
    protected $fillable = ['name','email','phone','table_number', 'date', 'time'];
}
