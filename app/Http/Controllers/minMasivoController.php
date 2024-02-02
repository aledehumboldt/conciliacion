<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\bypassMinImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BypasMin;
use App\Models\Incidencia;

class minMasivoController extends Controller
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

        $datos['bypas_mins'] = BypasMin::orderBy('id','asc')->paginate();
        return view('bypass.bypasMasivMin.index', $datos);
    }

    public function import(Request $request)
    {
        $file =$request->file('file');
        Excel::import(new bypasMin, $file);

        return back()->with('message', 'importacion completada');
    }

}
