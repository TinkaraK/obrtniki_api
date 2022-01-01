<?php

namespace App\Http\Controllers;
use App\Models\Post_number;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Post_number::all(),201);
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
            'city'=>'required',
            'id'=>'required'
        ]);
       return response(Post_number::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Post_number::find($id),201);
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
        $city = Post_number::find($id);
        $city->update($request->all());
        return response($city,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post_number::destroy($id);
    }

    /**
     * SEARCH
     *
     * @param  str  $cit
     * @return \Illuminate\Http\Response
     */
    public function search($cit)
    {
        return response(Post_number::where('city','like','%'.$cit.'%')->get(),201);
    }
}
