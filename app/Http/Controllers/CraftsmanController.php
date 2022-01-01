<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Craftsman;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CraftsmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $craftsmen = Craftsman::all();
        foreach ($craftsmen as $craftsman) {
            $craftsman["avg_rating"] = Rating::where("craftsman_id", "=", $craftsman->id)->pluck("rating")->avg();
        }
        return response($craftsmen,200);
    }

    public function ratings($id)
    {
        $ratings = Rating::where("craftsman_id", "=", $id)->get();
        return response($ratings,200);
    }

    public function comments($id)
    {
        $comments = Comment::where("craftsman_id", "=", $id)->get();
        return response($comments,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
            'address'=>'required',
            'post_number'=>'required',
            'city'=>'required',
            'phone_number'=>'required',
            'tax_number'=>'required',
            'trade_type_id'=>'required',
            'region_id'=>'required',
            "service_description" => "required",
            "company_description" => "required",
            "price_range_id" => "required",
            "user_id" => "required",
        ]);
       return response(Craftsman::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $craftman = Craftsman::find($id);
        $response = [
            'id'=> $craftman->id,
            'company_name'=>$craftman->company_name,
            'address'=>$craftman->address,
            'post_number'=>$craftman->post_number,
            'city'=>$craftman->city,
            'phone_number'=>$craftman->phone_number,
            'tax_number'=>$craftman->tax_number,
            'trade_type'=>$craftman->tradeType->type,
            'region'=> $craftman->region->region,
            "price_range" => $craftman->priceRange->range,
            "user_id" => $craftman->user_id,
            "service_description" => $craftman->service_description,
            "company_description" => $craftman->company_description,
            "avg_rating" => Rating::where("craftsman_id", "=", $craftman->id)->pluck("rating")->avg(),
        ];
        return response($response,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comp = Craftsman::find($id);
        $comp->update($request->all());
        return response($comp,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Craftsman::destroy($id);
    }

     /**
     * SEARCH
     *
     * @param  str  $com
     * @return \Illuminate\Http\Response
     */
    public function search($com)
    {
        return response(Craftsman::where('company_name','like','%'.$com.'%')->get(),201);
    }
}
