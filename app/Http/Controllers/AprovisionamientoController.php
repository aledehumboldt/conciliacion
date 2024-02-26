<?php

namespace App\Http\Controllers;

use App\Models\Aprovisionamiento;
use App\Http\Requests\StoreAprovisionamientoRequest;
use App\Http\Requests\UpdateAprovisionamientoRequest;

class AprovisionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('aprovisionamientos.index');
    }

    public function conexion() {
        return view('aprovisionamientos.conexion.index');
    }

    public function desconexion() {
        return view('aprovisionamientos.desconexion.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAprovisionamientoRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aprovisionamiento $Aprovisionamiento) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aprovisionamiento $Aprovisionamiento) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAprovisionamientoRequest $request, Aprovisionamiento $Aprovisionamiento) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aprovisionamiento $Aprovisionamiento) {
        //
    }
}
