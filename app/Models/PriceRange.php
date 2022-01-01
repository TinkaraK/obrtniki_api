<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "range"
    ];
    public function craftsmen(){
        return $this->hasMany('App\Models\Craftsman');
    }
}
