<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Exclusione;
use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['incidencias'] = Incidencia::paginate();
        return view('incidencias.index', $datos);
        //return $datos;
    }

    /**
     * Show the form for creating a new resource.
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

        $datosIncidencia = request()->except('_token', 'añadir');
        $inicio = Carbon::parse($datosIncidencia['inicio'])->format('Ymd');
        $fin = Carbon::parse($datosIncidencia['inicio'])->format('Ymd');

        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        Incidencia::insert($datosIncidencia);

        return redirect('incidencias')->with('mensaje', 'Incidencia u/o Requerimiento Creado.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('incidencias.crear');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return view('incidencias.consultar');
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
    public function destroy($id)
    {
          $post = Incidencia::find($id);
          $post->delete();
          return redirect()->route('incidencias.index')
            ->with('mensaje', 'Incidencia eliminada satisfactoriamente');
        }
}
