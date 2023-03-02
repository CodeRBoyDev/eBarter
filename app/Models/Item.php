<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Item extends Model implements Searchable
{
    use HasFactory;
    public $primaryKey = 'id';
    public $table = 'item';
    
    protected $fillable = ['title','category','description','imagePath','user_id','location',
     ];

     public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function barterRequest()
    {
        return $this->hasMany('App\Models\BarterRequest')
        ->whereNull("item_id");
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('item.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
         );
    }

}
