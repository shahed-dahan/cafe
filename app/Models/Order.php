<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['deliverd_at','customer_id','state'];


    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meals_orders', 'order_id','meal_id')
        ->withPivot('quantity', 'price')
        ->withTimestamps();
    }

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id');
    }
}
