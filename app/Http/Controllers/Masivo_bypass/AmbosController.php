<?php

namespace App\Http\Controllers\Masivo_bypass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\bypassImsiImport;
use App\Imports\bypassMinImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\BypasMin;
use App\Models\BypasImsi;

class AmbosController extends Controller
{
    protected function verify() {
        if (Auth::user()->estatus != "Iniciado") {
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

        return view('bypass_masivo.ambos.index');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $exclusions = Excel::toCollection(new bypassMinImport, $file);
        $exclusions1 = Excel::toCollection(new bypassImsiImport, $file);
        //return $file2;
        if (isset($request->incluir)) {
            
            Excel::import(new bypassMinImport, $file);
            Excel::import(new bypassImsiImport, $file);

            return back()->with('mensaje', 'importacion completada');

        }

        foreach($exclusions[0] as $exclusion){

            BypasMin::where('min', $exclusion[1])->delete();
        }

        foreach($exclusions1[0] as $exclusion1){

            BypasImsi::where('imsi', $exclusion1[2])->delete();
        }

        return back()->with('mensaje', 'Depurados Correctamente');
    }
}
