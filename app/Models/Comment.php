<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        'id_sender',
        'comment',
        'id_reciever'
    ];


    public function senders(){
        return $this->belongsTo('App\Models\User');
    }
    public function recievers(){
        return $this->belongsTo('App\Models\Craftsman');
    }
}
