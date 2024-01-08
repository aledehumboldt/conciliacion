<?php

namespace App\Http\Controllers;

use App\Models\BypasMin;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBypasMinRequest;
use App\Http\Requests\UpdateBypasMinRequest;
use Carbon\Carbon;

class BypasMinController extends Controller
{
    /**
     * Display a listing of the resource.
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
        if(!$this->verify()) {
            return back();
        }

        if(auth()->user()->perfil == "SA") {
            return redirect()->route('bypasMin.create');
        }

        $datos['excluidos'] = BypasMin::where('fecha', '>=', now()->format('Y-m-d H:i:s'))->paginate();
        return view('bypass.bypasMin.index', $datos);
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
