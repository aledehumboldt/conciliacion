<?php

namespace App\Http\Controllers;

use App\Models\Exclusione;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExclusioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $datos['exclusiones'] = Exclusione::where('fechae', '>=', now()->format('Y-m-d H:i:s'))->paginate();
        return view('exclusiones.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('exclusiones.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //Validando valores del formulario
        $campos = [
            'ticket' => 'required|string|min:10|max:10',
            'codarea' => 'required|string',
            'celular' => 'required|numeric',
            'fechae' => 'required|date|after:today',
            'tcliente' => 'required|string|min:7|max:8',
            'observaciones' => 'required|string|max:250',

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
        return redirect('exclusiones')->with('mensaje', 'Abonado Excluido.');
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        return view('exclusiones.consultar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) {
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy() {
        //
    }

    public function query (Request $request) {
        //
    }
}
