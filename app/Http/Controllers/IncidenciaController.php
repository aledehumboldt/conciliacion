<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['incidencias'] = Incidencia::where('inicio', '>=', now()->format('Y-m-d H:i:s'))->paginate();
        return view('incidencias.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidencias.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'ticket' => 'required|string|min:10|max:10',
            'inicio' => 'required|string',
            'fin' => 'required|string',
            'descripcion' => 'required|string|max:250',
            'solicitante' => 'required|string',
        ];

        $this->validate($request,$campos);

        //Guardando datos del formulario
        $datosExclusion = request()->except('_token', 'excluir');

        //Sustituyendo valores necesarios
        $fechae = Carbon::parse($datosExclusion['fechae'])->format('Ymd');
        $celular = $datosExclusion['codarea'].$datosExclusion['celular'];

        //Agregando valores necesarios
        $datosExclusion['usuario'] = auth()->user()->usuario;
        $datosExclusion['tecnologia'] = "GSM";
        $datosExclusion['fechac'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosExclusion['fechae'] = $fechae;
        $datosExclusion['celular'] = $celular;
        $datosExclusion['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosExclusion['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosExclusion['codarea']);

        //Insertando la tabla
        Exclusione::insert($datosExclusion);

        //Redireccionando
        return redirect('incidencias')->with('mensaje', 'Abonado Excluido.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('incidencias.consultar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
