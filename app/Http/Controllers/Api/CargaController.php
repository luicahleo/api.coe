<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    //

    public function uploadFile(Request $request)
    {
        return response()->json('hola');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            return response()->json($filename);
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            return PATHINFO_FILENAME;
            $name_file = str_replace(' ', '_', $filename);

            $extension = $file->getClientOriginalExtension();

            $picture = date('His') . '-' . $name_file . '.' . $extension;
            $file->move(public_path('Files/'), $picture);

            return response()->json(['mensaje'=> 'Imagen cargada success']);
        }else{
            return response()->json(['mensaje' =>'error']);

        }
    }
}
