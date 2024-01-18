<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meal;
use Excel;
use App\Exports\MealsExport;
use App\Imports\MealssImport;
use App\Imports\MealsImport;
use App\Traits\imageTrait;

class MealController extends Controller
{
    use imageTrait;
    public function create(){
        $menus= Menu::all();
        return view('meal.create',compact('menus'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'unique:meals'],
            'image' => ['required','file'],
            'price' => ['required','numeric'],
            'menu_id' => ['required','exists:menus,id']

        ]);
        $meal = new Meal();
        $meal->name=$request->name;
        $meal->price=$request->price;
        $meal->description=$request->description;
        $meal->menu_id=$request->menu_id;
        // $meal->image= $this->verifyAndUpload($request,'image','mealImage');
        if (!empty ($request->file('image'))) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(public_path('mealImage'), $imageName);
            $meal->image= $imageName;
        }

        $meal->save();
        return redirect()->back()->with('success','تمت الاضافة بنجاح');
    }

    public function edit($id){
        $menus= Menu::all();
        $meal=Meal::find($id);
        return view('meal.edit',compact('menus','meal'));
    }
    public function update($id,Request $request){
        $meal=Meal::find($id);
        $meal->name=$request->name;
       
        if (!empty ($request->file('image'))) {
            if(\File::exists(public_path('mealImage/').$meal->image)){
                \File::delete(public_path('mealImage/').$meal->image);
            }
           
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('mealImage'), $imageName);
            $meal->image= $imageName;
            $meal->price=$request->price;
            $meal->description=$request->description;
            $meal->menu_id=$request->menu_id;
        }
        $meal->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }
    public function index(){
        $meals=Meal::all();
        return view('meal.index',compact('meals'));
        
    }
    public function destroy($id)
    {
        $meal=Meal::find($id);
        if(\File::exists(public_path('mealImage/').$meal->image)){
            \File::delete(public_path('mealImage/').$meal->image);
        }
        $meal->delete();

        return redirect('meal-index')
            ->with('success','meal delete successfully.');
    }
    public function importview()
    {
        return view('meal.import');
    }
    //...
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new MealsImport, $file);
        return back()->with('success', 'Meals imported successfully.');
    }
    public function export()
    {
        return Excel::download(new MealsExport, 'meals.xlsx');
    }
    
}
