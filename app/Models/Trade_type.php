<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade_type extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "type"
    ];

    public function craftsmans(){
        return $this->hasMany('App\Models\Craftsman');
    }
}
