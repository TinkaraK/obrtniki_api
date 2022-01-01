<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "file_path",
       # "user_id",
        "craftsman_id",
        "created_at",
        "updated_at"
    ];

    public function craftsman(){
        return $this->belongsTo('App\Models\Craftsman');
    }

}
