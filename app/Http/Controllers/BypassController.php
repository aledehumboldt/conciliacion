<?php

namespace App\Http\Controllers;

use App\Models\Bypas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BypassController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Auth::user()->perfil == "CYA") {
                return $next($request);
            } else {
                return false;
            }
 
        });
    }

    public function index() {
        return view('bypass.index');
    }

    public function create(string $mod) {
        return view('bypass.crear',compact('mod'));
    }

    
    public function store (Request $request) {
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
