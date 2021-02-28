<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
public function index(){
    return view('admin.body.updatepassword');
}

public function updatepassword(Request $request){
    $this->validate($request, [
       'oldpassword' => 'required',
        'password' => 'required|confirmed'
    ]);

    $hashedValue = Auth::user()->password;

    if(Hash::check($request->oldpassword, $hashedValue)){
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Password Changed Successfully');
    }else{
        return redirect()->back()->with('success', 'password is invalid');
    }
}
}
