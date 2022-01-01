<?php

namespace App\Http\Controllers;
use App\Models\Craftsman;
use App\Models\Trade_type;
use App\Models\TradeType;
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
        return response(TradeType::all(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = TradeType::find($id)->type;
        $craftsmen = Craftsman::all()->where("trade_type_id", "=", $id);
        $craftsmen["trade_type"] = $type;
        return response($craftsmen,200);
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
