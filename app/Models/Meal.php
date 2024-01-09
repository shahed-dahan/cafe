<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $table="meals";
    protected $primarykey="id";
    protected $forignkey="menu_id";
    protected $timestamp=false;
    protected $fillable=['name','image','price','description','menu_id'];

    public function menu(){
        return $this->belongsTo('App\Models\Menu','menu_id','id');
    }
    public function Orders()
    {
    return $this->belongsToMany(Meal::class, 'meals_orders',
   'meal_id', 'order_id')
   ->withPivot('quantity', 'price')
   ->withTimestamps();
    }
   
 
}
