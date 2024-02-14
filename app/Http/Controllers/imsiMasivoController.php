<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\bypassImsiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BypasImsi;
use App\Models\Incidencia;

class imsiMasivoController extends Controller
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

        return view('bypass.bypasMasivImsi.index');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $exclusions = Excel::toCollection(new bypassImsiImport, $file);
        //return $file2;
        if (isset($request->incluir)) {
            
            Excel::import(new bypassImsiImport, $file);

            return back()->with('message', 'importacion completada');

        }

        foreach($exclusions[0] as $exclusion){

            BypasImsi::where('imsi', $exclusion[1])->delete();
        }

        return back()->with('message', 'Depurados Correctamente');
    }
}
