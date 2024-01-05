<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Incidencia;
use App\Models\BypasMin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidenciaController extends Controller
{

    protected function verify() {
        if (Auth::user()->perfil == "CYA" && Auth::user()->estatus != "Iniciado") {
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
        
        $datos['incidencias'] = Incidencia::paginate();
        return view('incidencias.index', $datos);
        //return $datos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, $id) {
        $campos = [
            'ticket' => 'required|string|min:10|max:10',
            'inicio' => 'required|string',
            'fin' => '',
            'descripcion' => 'required|string|max:250',
            'solicitante' => 'required|string',
        ];

        $this->validate($request,$campos);

        $vartmp = $request->bypass;

        $datosIncidencia = request()->except('_token', 'añadir');
        $inicio = Carbon::parse($datosIncidencia['inicio'])->format('Ymd');
        $fin = Carbon::parse($datosIncidencia['inicio'])->format('Ymd');

        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        unset($datosIncidencia['bypass']);

        Incidencia::insert($datosIncidencia);

        if ($vartmp == 1) {
            $var = BypasMin::where('id', $id)->get();
            BypasMin::destroy($var);
            return redirect('bypass/bypassMin')->with('mensaje', 'Abonado Excluido Exitosamente.');
        }
        else
            return redirect('incidencias')->with('mensaje', 'Incidencia u/o Requerimiento Creado.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request) {
        if(!$this->verify()) {
            return back();
        }

        return view('incidencias.crear');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {

        $campos = [
            'ticket' => 'required|string',
        ];

        $this->validate($request,$campos);

        $vartmp = $request->ticket;

        $incidencias = Incidencia::where('ticket',$vartmp)->get();
        return view('incidencias.consultar',compact('incidencias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        if(!$this->verify()) {
            return back();
        }
        
        $incidencia = Incidencia::findOrFail($id);
        return view('incidencias.editar', compact('incidencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'ticket' => 'required|string|min:10|max:10',
            'inicio' => 'required|string',
            'fin' => 'required|string',
            'descripcion' => 'required|string|max:250',
            'solicitante' => 'required|string',
          ]);
          $incidencia = Incidencia::find($id);
          $incidencia->update($request->all());
          return redirect()->route('incidencias.index')
            ->with('mensaje', 'Incidencia Actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
          $post = Incidencia::find($id);
          $post->delete();
          return redirect()->route('incidencias.index')
            ->with('mensaje', 'Incidencia eliminada satisfactoriamente');
        }
}
