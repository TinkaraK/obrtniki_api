<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "region"
    ];


    public function craftsmen(){
        return $this->hasMany('App\Models\Craftsman');
    }
}
