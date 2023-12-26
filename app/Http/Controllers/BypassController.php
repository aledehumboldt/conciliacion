<?php

namespace App\Http\Controllers;

use App\Models\Bypas;
use App\Models\BypasMin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BypassController extends Controller
{

    protected function verify() {
        if (Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }

    public function index() {
        if(!$this->verify()) {
            return back();
        }
        $bypassMin = BypasMin::where('fecha', '>=', now()->format('Y-m-d H:i:s'))->paginate();
        return view('bypasMin.index', $bypassMin);
        //return view('bypass.index');
    }

    public function create(string $mod) {
        if(!$this->verify()) {
            return back();
        }
        return view('bypass.crear',compact('mod'));
    }

    
    public function store (Request $request) {
        if(!$this->verify()) {
            return back();
        }
        //Validando valores del formulario
        $campos = [
            'ticket' => 'required|string|min:10|max:10',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'imsi' => 'required|numeric',
            'accion' => 'required|string|min:7|max:8',
            'tcliente' => 'required|string|min:7|max:8',
            'observaciones' => 'required|string|max:250',
        ];

        $this->validate($request,$campos);

        //Guardando datos del formulario
        $datosBypass = request()->except('_token', 'excluir');
        $datosBypass = request()->except('_token', 'incluir');

        //Sustituyendo valores necesarios
        $celular = $datosBypass['codarea'].$datosBypass['celular'];

        //Agregando valores necesarios
        $datosBypass['usuario'] = auth()->user()->usuario;
        $datosBypass['celular'] = $celular;
        $datosBypass['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosBypass['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosBypass['codarea']);

        //Insertando la tabla
        Bypas::insert($datosBypass);

        //Redireccionando
        return redirect('bypass/create')->with('mensaje', 'Abonado Procesado.');

    }
}
