<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlmacenamientoarchivoController extends Controller
{
    private $disk = "public";

    protected function verify() {
        if (Auth::user()->perfil == "CYA" && Auth::user()->estatus != "Iniciado") {
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

    $files =[];

        foreach (Storage::disk($this->disk)->files() as $file) {

            $name = str_replace("/","",$file);

            $filetitle = str_replace($file,"","");

            $document = "";

            $type = Storage::disk($this->disk)->mimeType($name);

            if (strpos($type,"image")!==false) {
                $picture = asset(Storage::disk($this->disk)->url($name));
            }

            $downloadLink = route("download",$name);

            $files[] = [
                "document" => $document,
                "name" => $name,
                "filetitle" => $filetitle,
                "link" => $downloadLink,
            ];
        }

        return view('documentacion.index',["files"=>$files]);
    }

    public function storeFile(Request $request)
    {
        if ($request->isMethod('POST')) {
            $dir = "/";

            $file = $dir.$request->file('file')->getClientOriginalName();

            $request->file('file')->storeAs($this->disk,$file);

        }

        return redirect()->route('documentacion.index')->with('mensaje', 'Documento subido exitosamente.');
    }

    public function downLoadfile($name)
    {
        $dir = "/";
        if (Storage::disk($this->disk)->exists($dir.$name)) {
            return Storage::disk($this->disk)->download($dir.$name);
        }

        return response('',404);
    }


}
