<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse; //added later if not helping REMOVE?
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request): JsonResponse

    {

        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;



//            $request->file('upload')->move(public_path('images/editor'), $fileName);
//            dd('test');
            $request->file('upload')->move('images/editor', $fileName);


            $url = asset('images/editor/' . $fileName);



            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);

        }else{
            return response()->json(['fileName' => null, 'uploaded'=> 0]);
        }

    }
}
