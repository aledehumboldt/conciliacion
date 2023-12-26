<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BypasMin;

use App\Http\Requests\StoreBypasMinRequest;
use App\Http\Requests\UpdateBypasMinRequest;

class BypasMinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index() {

    $bypas_mins = BypasMin::all();
    return view('bypass.bypassMin.index', compact('bypass_mins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBypasMinRequest $request)
    {
        //Guardando datos del formulario
        $datosMinbypas = request()->except('_token', 'excluir');
        $datosMinbypas = request()->except('_token', 'incluir');

        //Sustituyendo valores necesarios
        $min = $datosMinbypas['codarea'].$datosMinbypas['celular'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosMinbypas['codarea']);

        //Insertando la tabla
        BypasMin::insert($datosMinbypas);

        //Redireccionando
        return redirect('bypass/index')->with('mensaje', 'Abonado Procesado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BypasMin $bypasMin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BypasMin $bypasMin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBypasMinRequest $request, BypasMin $bypasMin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BypasMin $bypasMin)
    {
        //
    }
}
