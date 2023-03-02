<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'report';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','owner_id');
    }

    public function items()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
