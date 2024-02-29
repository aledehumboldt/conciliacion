<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class proofController extends Controller
{
    protected function verify() {
        if (Auth::user()->perfil == "CYA" && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }

    public function index(Request $request) {
        if(!$this->verify()) {
            return back();
        }
        if($request->ajax()){
            $data = Incidencia::select('*');

            return FacadesDataTables::of($data)->addIndexColumn()->make(true);
        }
        return view('proof.index');
    }
}
