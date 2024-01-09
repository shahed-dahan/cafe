<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meal;
class homecontroller extends Controller
{
    public function getmenu(){
        $menus=Menu::all();
        return view('UserViews.menu',compact('menus'));
    }
    public function getmeal($id){
        $menu=Menu::find($id);
        $meals=Meal::where('menu_id',$id)->get();
        return view('UserViews.meal',compact(['meals','menu']));
    }
    public function mealDetail($id){
        $meal=Meal::find($id);
       
        return view('UserViews.meal-detail',compact('meal'));
    }
    public function index(){
        return view('home');
    }
}
