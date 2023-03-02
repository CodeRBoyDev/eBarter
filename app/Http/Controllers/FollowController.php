<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(Request $request) {
        $userToFollow = User::where('id',$request->follow_id)->first();
        // dd($request->all());

      if(auth()->id() == $userToFollow->id){
        return back()->with('fail','You cannot follow yourself');

      }else{
        Follow::create([
            'user_id' => auth()->id(),
            'following_id' => $userToFollow->id
        ]);
        
        return redirect()->back();

      }
       
    }

    public function unfollow(Request $request) {
        $userToFollow = User::where('id',$request->follow_id)->first();

        Follow::where('user_id', auth()->id())->where('following_id', $userToFollow->id)->delete();
        return redirect()->back();
    }
}
