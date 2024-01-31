<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\BypasMin;
use App\Models\BypasImsi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BypassAmbosController extends Controller
{
    /**
     * Verify if the user can see these views.
     */
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('bypass.bypassAmbos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //Validando parametros enviados 
        $campos = [
            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'imsi' => 'required|numeric',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string',
        ];

        $this->validate($request,$campos);

        //-------------------Bypass--------------
        //En caso de ser una exclusion
        if (isset(request()->excluir)) {
            return $this->destroy($request);
        }

        //Sustituyendo valores necesarios
        $datosBypass = request()->except('_token', 'incluir');
        $min = $datosBypass['codarea'].$datosBypass['min'];
        $imsi = $datosBypass['imsi'];

        //Agregando valores necesarios
        $datosBypass['min'] = $min;
        $datosBypass['usuario'] = auth()->user()->usuario;
        $datosBypass['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosBypass['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosBypass['codarea'],$datosBypass['imsi']);

        //Insertando la tabla Bypass MIN
        BypasMin::insert($datosBypass);
        //------------------------------------------
        //Agregando valores necesarios
        $datosBypass['imsi'] = $imsi;

        //Eliminando del array
        unset($datosBypass['min'],$datosBypass['tcliente']);

        //Insertando la tabla Bypass IMSI
        BypasImsi::insert($datosBypass);
        //-------------------Bypass------------------

        //-------------------Incidencia--------------
        //Agregando valores necesarios
        $datosBypass['inicio'] = date("Y-m-d H:i:s", strtotime($request->fecha));
        $datosBypass['descripcion'] = $request->observaciones;
        $datosBypass['solicitante'] = auth()->user()->perfil;
        $datosBypass['tipo'] = "requerimiento";

        //Eliminando del array
        unset(
            $datosBypass['usuario'],
            $datosBypass['imsi'],
            $datosBypass['observaciones'],
            $datosBypass['fecha']
        );

        //Insertando la tabla Incidencias
        Incidencia::insert($datosBypass);
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassAmbos.create')
        ->with('mensaje', 'Inclusion realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {
        //Sustituyendo valores necesarios
        $datosIncidencia = $request->except('_token', 'excluir');
        $min = $datosIncidencia['codarea'].$datosIncidencia['min'];

        //Eliminando de la tabla Bypass MIN
        $numero = BypasMin::where('min',$min);
        $numero->delete();

        //Eliminando de la tabla Bypass IMSI
        $numero = BypasImsi::where('imsi',$datosIncidencia['imsi']);
        $numero->delete();

        //-------------------Incidencia--------------
        $datosIncidencia = request()->except('_token', 'excluir');

        //Agregando valores necesarios
        $datosIncidencia['descripcion'] = $request->observaciones;
        $datosIncidencia['solicitante'] = auth()->user()->perfil;
        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['inicio'] = date("Y-m-d H:i:s", strtotime($request->fecha));
        $datosIncidencia['tipo'] = "requerimiento";

         //Eliminando del array
         unset(
            $datosIncidencia['min'],$datosIncidencia['imsi'],
            $datosIncidencia['codarea'],$datosIncidencia['tcliente'],
            $datosIncidencia['observaciones'],$datosIncidencia['fecha'],
        );
        
        //Agregando registro a Incidencia
        Incidencia::insert($datosIncidencia);
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassAmbos.create')
        ->with('mensaje', 'Exlusión realizada exitosamente.');
    }
}
