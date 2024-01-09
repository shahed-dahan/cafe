<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $primarykey="id";
    protected $forignkey="meal_id";
    protected $timestamp=false;
    protected $fillable=['customer_id','meal_id','quantity'];
    public function meal(){
        return $this->belongsTo('App\Models\Meal','meal_id','id');
        
    }
}
