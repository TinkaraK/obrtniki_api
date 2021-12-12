<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int id
 * @property string name
 */
class TradeType extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name"
    ];

    /*public function tradeType() {
        return $this->belongsTo(TradeType::class);
    }*/
}
