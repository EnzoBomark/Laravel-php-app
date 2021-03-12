<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    public function avatar(Request $request){
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }
        return redirect()->back();
    }
}
