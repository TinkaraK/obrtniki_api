<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'craftsman_id' => 'required',
                'file'  => 'required|mimes:png,jpg|max:2048'
            ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('public/documents');

            //store your file into database
            $image = new Image();
            $image->title = $file;
            $image->craftsman_id = $request->craftsman_id;
            $image->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);

        }
    }

    public function show($craftsman_id) {
        $images = Image::where("craftsman_id", "=", $craftsman_id)->get();
        $response = [];
        foreach ($images as $image) {
            $response[$image->id] = Image::make(Storage::disk("local")->get($image->title));
        }
        return response($response, 200);
    }
}
