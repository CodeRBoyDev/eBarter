<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Item;

class SearchController extends Controller
{
    public function search(Request $request){
    	$searchResults = (new Search())
		   ->registerModel(Item::class, 'title','category','description','imagePath','user_id','location')
 		   ->search($request->search);
		   // dd($searchResults);
	   // return view('item.search',compact('searchResults'));
		   return view('item.search',compact('searchResults'));
    }
}
