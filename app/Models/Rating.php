<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        'user_id',
        'rating',
        'craftsman_id'
    ];


    public function senders(){
        return $this->belongsTo('App\Models\User');
    }
    public function recievers(){
        return $this->belongsTo('App\Models\Craftsman');
    }
}
