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
        $mes = date('m');
        $anio = date('Y');
        $dateFrom = $anio."-".$mes."-01 00:00:00";
        $dateTo = $anio."-".$mes."-31 23:59:59";
        $incidencias = Incidencia::select('*')->get();

        if($request->ajax()){
            $data = Incidencia::select('*')->get();
            return FacadesDataTables::of($data)->addIndexColumn()->addColumn('action', function($data){
                $button = '<a href="/incidencias/'.$data->id.'/edit"><button class="btn btn-secondary" title="Editar" id="editar" name="editar"><svg class="bi"><use xlink:href="#pencil"/></svg></button></a>';
                //$button .= '<button type="button" class="delete btn btn-danger me-md-2" style="margin-left: 15px" name="edit" id="'.$data->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16"><path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/></svg></button>';
                
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('proof.index', compact('incidencias'));
    }
}
