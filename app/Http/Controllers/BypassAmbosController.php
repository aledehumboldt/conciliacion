<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\BypasMin;
use App\Models\BypasImsi;
use Carbon\Carbon;

class BypassAmbosController extends Controller
{
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
        $datosBypass['inicio'] = $request->fecha;
        $datosBypass['fin'] = $request->fecha;
        $datosBypass['descripcion'] = $request->observaciones;
        $datosBypass['solicitante'] = auth()->user()->perfil;

        //Eliminando del array
        unset($datosBypass['usuario'],$datosBypass['imsi'],$datosBypass['observaciones'],$datosBypass['fecha']);

        //Insertando la tabla Incidencias
        Incidencia::insert($datosBypass);
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassAmbos.create')->with('mensaje', 'Inclusion realizada exitosamente.');
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
    public function destroy(Request $request, string $id) {
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
        $datosBypass['inicio'] = $request->fecha;
        $datosBypass['fin'] = $request->fecha;
        $datosBypass['descripcion'] = $request->observaciones;
        $datosBypass['solicitante'] = auth()->user()->perfil;

        //Eliminando del array
        unset($datosBypass['usuario'],$datosBypass['imsi'],$datosBypass['observaciones'],$datosBypass['fecha']);

        //Insertando la tabla Incidencias
        Incidencia::insert($datosBypass);
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassAmbos.create')->with('mensaje', 'Inclusion realizada exitosamente.');
    }
}
