<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;
use App\Models\Follow ;
use App\Models\BarterRequest;

use View;
use Auth;
use Storage;
use App\Models\Item;
use DB;
class UserController extends Controller
{
    public function  register()
    {
        return view('profile.signup');
    }

    public function  signin()
    {
        return view('profile.signin');
    }
    public function  getProfile()
    {
        if(Auth::check()){
            $loggedIn_user=Auth::User();
            
            $item = Item::where('user_id',$loggedIn_user->id)->get();
            // dd($item);
            $sum = DB::table('ratings')
            ->where('owner_id',$loggedIn_user->id)
            ->sum('rating');
        
            $count = DB::table('ratings')
            ->where('owner_id',$loggedIn_user->id)
            ->count('rating');
           
             $comments = Rating::where('owner_id', $loggedIn_user->id)->where('status', 1)->with('user','items')->get();
            $followers = Follow::where('following_id',$loggedIn_user->id)->with('user')->get();
            $requests1 = BarterRequest::Select('owner_id')->get();
            $requests = BarterRequest::where('owner_id',$loggedIn_user->id)->with('user','items')->get();

            $followerFollows = Follow::all();
            foreach($followerFollows as $followerFollow)
            // $follower = Follow::where('following_id',$loggedIn_user->id)->with('user')->toArray();
            // dd($follower);
            // if(Auth::check()){
            //     $loggedIn_user=Auth::User();
            // $userId = DB::table('follows')->where('user_id',$follower->user->id)
            // ->where('following_id',$loggedIn_user->id)->exists();
            // }else{
            //     $userId = 'guest';
            // }
            
            $countFollower = DB::table('follows')
            ->where('following_id',$loggedIn_user->id)
            ->count('following_id');

            $countComment = DB::table('ratings')
            ->where('owner_id',$loggedIn_user->id)
            ->count('rating');

            $countRequest = DB::table('barter_request')
            ->where('owner_id',$loggedIn_user->id)
            ->count('id');
         
            if ($sum == 0 && $count == 0) {
                $totalRating = 0;
            } else {
                $totalRating = $sum / $count;
            }

           if($loggedIn_user->role =="admin")
           {
            return View::make('admin.dashboard');

           }else{
            return View::make('profile.index',compact('loggedIn_user','item','totalRating','comments','countComment','followers','followerFollow','countFollower','countRequest','requests','requests1'));
           }
          }  
    }
    public function  profileEdit($id)
    {
        $user = User::find($id);
        return View::make('profile.edit',compact('user'));
    }
    
    public function  profilePostEdit(Request $request, $id)
    {
        
        $user = User::find($id);
        if($request->hasFile('coverphoto')) {
            Storage::delete($user->coverphoto);
            $image = $request->file('coverphoto')->getClientOriginalName(); 
            // dd( $request->file('img_path')); 
            $request->file('coverphoto')->storeAs('public/images', $image); 
            $user['coverphoto'] = 'storage/images/' .$image;   
        }

        if($request->hasFile('profilephoto')) {
            Storage::delete($user->profilephoto);
            $image = $request->file('profilephoto')->getClientOriginalName(); 
            // dd( $request->file('img_path')); 
            $request->file('profilephoto')->storeAs('public/images', $image); 
            $user['profilephoto'] = 'storage/images/' .$image;   
        }
        
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->address = $request->address;
        $user->town = $request->town;
        $user->birth  = $request->birth;
        $user->save();

        $admin = Auth::User();
        if($admin ->id =='8')
        {
            return Redirect::to('admin')->with('success','Profile updated!');
        }
        else
        {
            
        }
        return Redirect::to('profile')->with('success','Profile updated!');
    }

    public function postSignup(Request $request){
        // $this->validate($request, [
        //  'name' => 'required',
        //  'lname' => 'required',
        //  'address' => 'required',
        //  'town' => 'required',
        //  'zipcode' => 'required',
        //  'phone' => 'required|min:11',
        //  'birth' => 'required',
        //  'gender' => 'required',
        //  'email' => 'email|required|unique:users',
        //  'password' => 'required| min:4'
        // ]);
        // dd($request->all());
         $user = new User([
          'name' => $request->input('name'),
          'lname' => $request->input('lname'),
          'address' => $request->input('address'),
          'town' => $request->input('town'),
          'zipcode' => $request->input('zipcode'),
          'phone' => $request->input('phone'),
          'role' => "customer",
          'birth' => $request->input('birth'),
          'gender' => $request->input('gender'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password'))
     
        ]);
 
        $user->save();
         return redirect()->route('user.signin');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
