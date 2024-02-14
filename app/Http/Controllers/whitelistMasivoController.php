<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\bypassWhitelistImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BypasWhitelist;
use App\Models\Incidencia;

class whitelistMasivoController extends Controller
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

        return view('bypass.bypasMasivWhitelist.index');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $exclusions = Excel::toCollection(new bypassWhitelistImport, $file);
        //return $file2;
        if (isset($request->incluir)) {
            
            Excel::import(new bypassWhitelistImport, $file);

            return back()->with('mensaje', 'importacion completada');

        }

        foreach($exclusions[0] as $exclusion){

            BypasWhitelist::where('min', $exclusion[1])->delete();
        }

        return back()->with('mensaje', 'Depurados Correctamente');
    }
}
