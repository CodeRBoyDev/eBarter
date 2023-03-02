<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;
use DB;
use Auth;
class ProductRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $item;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
      
        $sum = DB::table('ratings')
    ->where('item_id',$this->item->id)
    ->sum('rating');

    $count = DB::table('ratings')
    ->where('item_id',$this->item->id)
    ->count('rating');

    $ratingSum = DB::table('ratings')
    ->where('owner_id',$this->item->user_id)
    ->sum('rating');

    $ratingCount = DB::table('ratings')
    ->where('owner_id',$this->item->user_id)
    ->count('rating');

    if(Auth::check()){
        $loggedIn_user=Auth::User();
    $userId = DB::table('follows')->where('user_id',$loggedIn_user->id)
    ->where('following_id',$this->item->user_id)->exists();
    }else{
        $userId = 'guest';
    }

    if(Auth::check()){
        $loggedIn_user=Auth::User();
    $report = DB::table('report')->where('user_id',$loggedIn_user->id)
    ->where('item_id',$this->item->id)->exists();
    }else{
        $report = 'guest';
    }



   
    // dd($report);

    if ($sum == 0 && $count == 0) {
        $totalRating = 0;
    } else {
        $totalRating = $sum / $count;
    }

    if ($ratingSum == 0 && $ratingCount == 0) {
        $totalRatings = 0;
    } else {
        $totalRatings = $ratingSum / $ratingCount;
    }

        $comments = Rating::where('item_id', $this->item->id)->where('status', 1)->with('user')->get();
        $owner = DB::table('item')->where('id',$this->item->id)->pluck('user_id')->first();
        $userss = DB::table('users')->where('id', $owner)->first();
        return view('livewire.product-ratings', compact('comments','totalRating','totalRatings','userss','count','userId','report'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('item_id', $this->item->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.product-ratings');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $owner = DB::table('item')->where('id',$this->item->id)->pluck('user_id')->first();

        $rating = Rating::where('user_id', auth()->user()->id)->where('item_id', $this->item->id)->first();
        $this->validate();
        if(auth()->id() == $owner ){
            return back()->with('fails','You cannot rate your item');
        }else {
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->item_id = $this->item->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->owner_id = $this->item->user_id;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->item_id = $this->item->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->owner_id = $this->item->user_id;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
    }
}