<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        'user_id',
        'comment',
        'craftsman_id'
    ];


    public function senders(){
        return $this->belongsTo('App\Models\User');
    }
    public function recievers(){
        return $this->belongsTo('App\Models\Craftsman');
    }
}
