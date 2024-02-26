<?php

namespace App\Http\Controllers\Masivo_bypass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\bypassImsiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\BypasImsi;

class ImsiController extends Controller
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

        return view('bypass_masivo.imsi.index');
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
