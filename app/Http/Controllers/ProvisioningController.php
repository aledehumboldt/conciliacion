<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProvisioningController extends Controller
{
    private $disk = "public";

    protected function verify() {
        if (Auth::user()->perfil == "CYA"
        && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        if(!$this->verify()) {
            return back();
        }

    $archivos = array();

        foreach (Storage::disk($this->disk)->files() as $file) {

            $arrFiles = array();
            $link = array();

            $arrFiles = scandir('storage');

            foreach ($arrFiles as $arrFile) {
                if ($arrFile != ".." && $arrFile != ".") {
                    $titles [] = $arrFile;
                    if (is_dir('storage/'.$arrFile)) {

                        $arrFilesDos = array();
                        $arrFilesDos = scandir('storage/'.$arrFile);

                        foreach ($arrFilesDos as $fileDos) {
                            if ($fileDos != ".." && $fileDos != ".") {

                                $arraylink = $arrFile."/".$fileDos;

                                $archivos[] = [
                                    'name' => $fileDos,
                                    'link' => route("download",$arraylink),
                                    'title' => $arrFile,
                                ];

                            }
                        }
                    }
                }
            }
        }

        return view('documentacion.index',compact('archivos'));
    }

    public function store(Request $request) {
        if ($request->isMethod('POST')) {
            
            $file = $request->categoria."/".$request->file('file')->getClientOriginalName();

            $request->file('file')->storeAs($this->disk,$file);

        }

        return redirect()->route('documentacion.index')
        ->with('mensaje', 'Documento subido exitosamente.');
    }

    public function download($name) {
        if (Storage::disk($this->disk)->exists($name)) {
            return Storage::disk($this->disk)->download($name);
        }

        return response('',404);
    }

    public function category (Request $request){

        $campos = [
            'categoria' => 'required|string',
        ];

        $this->validate($request,$campos);

        $datosCategory = request()->except('_token', 'guardar');

        $categoria = $datosCategory['categoria'];

        $dir = "storage/";

        $rutdir = $dir.$categoria;

        mkdir($rutdir,0777);

        return redirect()->route('documentacion.index')
        ->with('mensaje', 'Categoria cargada exitosamente.');
    }
}
