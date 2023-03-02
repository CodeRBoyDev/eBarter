<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\BarterRequest;
use Auth;
use View;

class TransactionController extends Controller
{
    public function barterRequest(Request $req)

    {
        $loggedIn_user=Auth::User();
        $BarterRequest = new BarterRequest ();
        if( $req->user_id == $loggedIn_user->id)
        {
            return redirect()->back()->with('error','This is your Item!!!');
            
        }else if($req->mode == 'meetup')
        {
            $BarterRequest->user_id =   $loggedIn_user->id;
            $BarterRequest->item_id = $req->item_id;
            $BarterRequest->owner_id = $req->user_id;
            $BarterRequest->barter_mode =$req->mode;
            $BarterRequest->meeting_place =$req->meetup;
            $BarterRequest->status = "Pending";
            $BarterRequest->save();
        }
        else{
            $BarterRequest->user_id =   $loggedIn_user->id;
            $BarterRequest->item_id = $req->item_id;
            $BarterRequest->owner_id = $req->user_id;
            $BarterRequest->barter_mode =$req->mode;
            $BarterRequest->meeting_place ="NA";
            $BarterRequest->status = "Pending";
            $BarterRequest->save(); 
        }  
        return redirect()->back()->with('success','Wait for the owner to accept your request.');

    
    }
    static function totalrequest()
    {
        
        $loggedIn_user=Auth::User();

        $barterRequest = BarterRequest::where('user_id',$loggedIn_user->id)
        ->count('id');

      
        return ($barterRequest); 
    }
    public function  postRequest(Request $request, $id)
    {

   $barterRequest = BarterRequest::find($id);
   $barterRequest->status = "Accepted";
   $barterRequest->save();
   return redirect()->back()->with('success','Confirmed Barter Mode.');

    }

    public function  barterlist()
    {

        $loggedIn_user=Auth::User();
        $requests = BarterRequest::where('user_id',$loggedIn_user->id)->with('user','items')->get();
   return  View::make('profile.barterlist',compact('requests'));

    }
    public function cancel(Request $request) {

        $requests = BarterRequest::where('id',$request->item_id)->delete();

         return redirect()->back();
    }
}
