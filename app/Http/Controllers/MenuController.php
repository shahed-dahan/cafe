<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
   
    public function create(){
        return view('menu.create');
    }
    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'name' => ['required', 'unique:menus'],
        //     'image' => ['required'],
        // ]);
        $validator = Validator::make($request->all(),[
            'name' => ['required','unique:menus'],
            'image' => ['required'],
        ],[
            'name.unique'=>'هذا التصنيف موجود مسبقا',
            'name.required'=> 'يرجى تحديد اسم الصنف',
            'image.required' => 'يرجى اختيار الصورة'
        ])->validate();
      
        $menu = new Menu();
        $menu->name=$request->name;
        // $menu->image= $this->verifyAndUpload($request,'image','menuImage');
        if (!empty ($request->file('image'))) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(public_path('menuImage'), $imageName);
            $menu->image= $imageName;
        }

        $menu->save();
        return redirect()->back()->with('success','تمت الاضافة بنجاح');
    }
    public function index(){
        $menus=Menu::all();
        return view('menu.index',compact('menus'));
        
    }
    public function edit($id){
        $menu=Menu::find($id);
        return view('menu.edit',compact('menu'));
    }


    public function update($id,Request $request){
        $menu=Menu::find($id);
        $menu->name=$request->name;
        if (!empty ($request->file('image'))) {
            if(\File::exists(public_path('menuImage/').$menu->image)){
                \File::delete(public_path('menuImage/').$menu->image);
            }
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('menuImage'), $imageName);
            $menu->image= $imageName;
        }
        $menu->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }
    public function destroy($id)
    {
        $menu=Menu::find($id);
        if(\File::exists(public_path('menuImage/').$menu->image)){
            \File::delete(public_path('menuImage/').$menu->image);
        }
        $menu->delete();

        return redirect('menu-index')
            ->with('success','Menu delete successfully.');
    }
}