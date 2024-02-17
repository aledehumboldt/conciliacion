<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\bypassAmbosImport;
use App\Imports\bypassImsiImport;
use App\Imports\bypassMinImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BypasMin;
use App\Models\BypasImsi;

class ambosMasivoController extends Controller
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
        
        //validando el perfil de usuario
        if (Auth::user()->perfil == "SA") {
            return $this->create();
        }

        return view('bypass.bypasMasivAmbos.index');
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
