<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_number extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "city"
    ];


    public function craftsmans(){
        return $this->hasMany('App\Models\Craftsman');
    }
}
