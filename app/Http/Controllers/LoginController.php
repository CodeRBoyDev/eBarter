<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postSignin(Request $request)
    {

        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required|min:4'
        ]);
    if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else if (auth()->user()->role == 'encoder'){
             return redirect()->route('item.index');
            } 
            else {
                return redirect()->route('user.profile');
            }
        }
        else{
            return back()->withInput()->with('fail','Invalid Email or Password');
        }
    }
        
}