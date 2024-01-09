<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class customer extends Model

{
    use HasFactory;
    protected $fillable=['customer_name','user_id','state','phone','address','state'];
    public function Orders(){
        return $this->hasMany(Order::class);
    }
    public function carts(){
        return $this->hasMany(Carts::class);
    }

}
