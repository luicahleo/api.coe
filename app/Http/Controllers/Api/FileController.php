<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'file' => 'required|mimes:docx,doc'
        ]);

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
        $ruta = storage_path() . '/app/public/documentos/' . $nombre;

        //$request->file('file')->store($ruta);.
        //$url = Storage::url($request->file('file'));
        $fichero = $request->file('file')->storeAs('public/documentos', 'prueba.docx');

        //$scriptFile = "C:\MAMP\htdocs\apiCOE\public\storage\documentos\hola.sh";

         $process = new Process(['ls']);
         $process->run();

        // if(!$process->isSuccessful()){
        //     throw new ProcessFailedException($process);
        // }

        echo $process->getOutput();

        return response($process->getOutput(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
