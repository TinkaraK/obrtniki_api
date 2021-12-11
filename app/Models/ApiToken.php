<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;
    protected $casts = [
        "last_used_at" => "timestamp"
    ];

    protected $fillable = [
        "value",
        "last_used_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
