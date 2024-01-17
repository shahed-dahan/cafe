<?php
namespace App\Traits;
use Illuminate\Http\Request;
trait imageTrait {
    public function verifyAndUploade(Request $request, $fieldname='image' ,$directory='images')
    {
    if($request->hasFile($fieldname)){
        $imageName = uniqid() . $request->file($fieldname)->getClientOriginalName();

        $request->file($fieldname)->move(public_path($directory), $imageName);
       return $imageName;
    }
    }
  
}