<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarterRequest extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    public $table = 'barter_request';
    protected $fillable = ['user_id','item_id','barter_mode','meeting_place','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function items()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
