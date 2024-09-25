<?php

namespace App\Http\Controllers\Masivo_bypass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\bypassMinImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\BypasMin;

class MinController extends Controller
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

        $datos['bypas_mins'] = BypasMin::orderBy('id','desc')->paginate();
        return view('bypass_masivo.min.index', $datos);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $exclusions = Excel::toCollection(new bypassMinImport, $file);
        //return $file2;
        if (isset($request->incluir)) {
            
            Excel::import(new bypassMinImport, $file);

            return back()->with('message', 'importacion completada');

        }

        foreach($exclusions[0] as $exclusion){

            BypasMin::where('min', $exclusion[1])->delete();
        }

        return back()->with('message', 'Depurados Correctamente');
    }

}
