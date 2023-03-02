<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Redirect;
use Illuminate\Http\Request;
use Auth;
use DB;
use View;
use Carbon\Carbon;

 class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        $input = $request->all();
        
        if($request->hasFile('imagePath')) {
            $image = $request->file('imagePath')->getClientOriginalName(); 
            // dd( $request->file('img_path')); 
            $request->file('imagePath')->storeAs('public/images', $image); 
            $input['imagePath'] = 'storage/images/' .$image;
            // dd($input);
        }

        $item = Item::create($input);

        return Redirect::to('profile')->with('success','POSTED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $item= DB::table('item')  
        // ->where('item.id','=', $id)
        //  ->Select('item.*') 
        // ->first();
        // $date = Carbon::parse($item->created_at)->format('Y-m-d');
        // $time = Carbon::parse($item->created_at)->format('H:i');
        //     // dd($item->imagePath);

        // return View::make('item.show',compact('date','time','item'));

    //     $sum = DB::table('ratings')
    // ->where('item_id',$id)
    // ->sum('rating');

    // $count = DB::table('ratings')
    // ->where('item_id',$id)
    // ->count('rating');

    // $totalRating = $sum / $count;

        $item = Item::findOrFail($id);
        $loggedIn_user=Auth::User();
        return View::make('item.showitem',compact('item','loggedIn_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
