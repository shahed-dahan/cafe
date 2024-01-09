<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meal;
class ApiController extends Controller
{
    public function getMenu(){
            $menus=Menu::with('meals')->get();
            return response()->json($menus);
    }




    public function store(Request $request){
        $menu = new Menu();
        $menu->name=$request->name;
        if (!empty ($request->file('image'))) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(public_path('menuImage'), $imageName);
            $menu->image= $imageName;
        }
        $menu->save();
        return response()->json(['message'=>'Added menu successfuly'],200);
    }

    public function getmeals(Request $request){
        $menu=Menu::find($request->id);

        if(!empty($menu)){
         return response()->json($menu->meal);

        }else{
            return response()->json(['not Found'],404);
        }

    }
}
