<?php

namespace App\Http\Controllers;
use App\Models\Craftsman;
use App\Models\Rating;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $odg = DB::table('craftsmen')
        ->leftJoin('ratings', 'rating..id_reciever', '=', 'craftsmen.id')
        ->select('craftsmen.*', DB::raw('avg(rating) as ratingg'))
        ->whereBetween('ratingg', [$request->min, $request->max])
        ->groupby('craftsmen.id')
        ->get();
        
        
        $req = $request->except('_token');
        foreach($req as $key => $value){
            if($key != "min" && $key != "max"){
            $odg = $odg->where($key,$value);
            }
        }
       return response($odg,201);
    }
}
