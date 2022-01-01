<?php

namespace App\Http\Controllers;
use App\Models\Price_range;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Price_range::all(),201);
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
            'range'=>'required'
        ]);
       return response(Price_range::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Price_range::find($id),201);
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
        $range = Price_range::find($id);
        $range->update($request->all());
        return response($range,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Price_range::destroy($id);
    }

     /**
     * SEARCH
     *
     * @param  str  $reg
     * @return \Illuminate\Http\Response
     */
    public function search($rang)
    {
        return response(Price_range::where('range','like','%'.$rang.'%')->get(),201);
    }
}
