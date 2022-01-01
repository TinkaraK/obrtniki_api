<?php

namespace App\Http\Controllers;
use App\Models\Trade_type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TradeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Trade_type::all(),201);
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
            'type'=>'required'
        ]);
       return response(Trade_type::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Trade_type::find($id),201);
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
        $type = Trade_type::find($id);
        $type->update($request->all());
        return response($type,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trade_type::destroy($id);
    }

    /**
     * SEARCH
     *
     * @param  str  $typ
     * @return \Illuminate\Http\Response
     */
    public function search($typ)
    {
        return response(Trade_type::where('type','like','%'.$typ.'%')->get(),201);
    }
}
