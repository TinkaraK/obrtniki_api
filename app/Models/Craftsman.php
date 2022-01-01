<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craftsman extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'company_name',
            'address',
            'post_number',
            'phone_number',
            "city",
            'tax_number',
            'trade_type_id',
            'service_description',
            'company_description',
            'region_id',
            'price_range_id',
            'user_id',
    ];

     public function region(){
         return $this->belongsTo('App\Models\Region');
     }
     public function postNumber(){
        return $this->belongsTo('App\Models\Post_number');
    }
    public function priceRange(){
        return $this->belongsTo('App\Models\PriceRange');
    }
    public function tradeType(){
        return $this->belongsTo('App\Models\TradeType');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }
}


