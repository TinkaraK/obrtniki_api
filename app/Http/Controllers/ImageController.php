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
            $path ='public/documents'."/" . $request->craftsman_id;
            $files = Storage::files($path);
            $file = $request->file->storeAs($path, count($files) .".jpg");


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
            $response[$image->id] = url('storage/documents/' . $image->id);
        }
        return response($response, 200);
    }
}
