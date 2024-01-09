<?php
namespace App\Traits;
use Illuminate\Http\Request;

trait imageTrait
{


public function verifyAndUpload(Request $request,$filedname='image',$directory='images'){
    if ($request->hasFile($filedname)){

        $imageName=uniqid().$request->file($filedname)->getClientOriginalName();
        $request->file($filedname)->move(public_path($directory),$imageName);
        return $imageName;
    }
    }
}