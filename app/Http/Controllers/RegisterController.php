<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;
use Redirect;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function  register()
    {
        return view('profile.signup');
    }
    public function postSignup(Request $request){

        $rules = [
        'fname' => 'required',
         'lname' => 'required',
         'address' => 'required',
         'town' => 'required',
         'zipcode' => 'required',
         'phone' => 'required|min:11',
         'birth' => 'required',
         'gender' => 'required',
         'email' => 'email|required|unique:users',
         'password' => 'required| min:4'
            ];



        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){
        $user = new User([
            'name' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'gender' => $request->input('gender'),
            'birth' => $request->input('birth'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'town' => $request->input('town'),
            'zipcode' => $request->input('zipcode'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
       
          ]);
   
          $user->save();
          Auth::login($user);
           return redirect()->route('home');
        }
           else{
            return redirect()->back()->withInput()->withErrors($validator);
           }


    }
}
