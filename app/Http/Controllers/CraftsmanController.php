<?php

namespace App\Http\Controllers;
use App\Models\Craftsman;
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
        return response(Craftsman::all(),201);
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
            'id'=>'required|unique',
            'company_name'=>'required',
            'address'=>'required',
            'post_number'=>'required',
            'phone_number'=>'required',
            'tax_number'=>'required',
            'trade_type'=>'required',
            'region'=>'required',
            'price_range'
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
        return response(Craftsman::find($id),201);
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
