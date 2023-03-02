<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request) {
        $userReport = User::where('id',$request->owner_id)->first();
      

      if(auth()->id() == $userReport->id){
        return back()->with('error','You cannot report your item');

      }else{
        Report::create([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'report_description' => $request->report_description,
            'owner_id' => $request->owner_id
        ]);
        
        return redirect()->back()->with('success','Your feedback helps us build a better community for barterer.');

      }
    }
}
