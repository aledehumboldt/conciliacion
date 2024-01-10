<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Incidencia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IncidenciaExport;
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
    public function create(Request $request) {
        if(!$this->verify()) {
            return back();
        }

        return view('incidencias.crear');
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request, $id) {

        if ($id == 3) {
        $campos = [
            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string',
        ];

        $this->validate($request,$campos);

        $datosMinbypas = request()->except('_token', 'incluir');
        $datosIncidencia = $datosMinbypas;
        //Sustituyendo valores necesarios
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['ticket'] = $request->ticket;
        $datosIncidencia['inicio'] = $request->fecha;
        $datosIncidencia['fin'] = $request->fecha;
        $datosIncidencia['descripcion'] = $request->observaciones;
        $datosIncidencia['solicitante'] = auth()->user()->perfil;
        $datosIncidencia['updated_at'] = $datosMinbypas['updated_at'];
        $datosIncidencia['created_at'] = $datosMinbypas['created_at'];

        //Eliminando del array
        unset($datosMinbypas['codarea']);
        unset($datosIncidencia['usuario'],$datosIncidencia['min'],$datosIncidencia['codarea'],$datosIncidencia['observaciones'],$datosIncidencia['tcliente'],$datosIncidencia['fecha']);

        //Insertando la tabla
        BypasMin::insert($datosMinbypas);
        Incidencia::insert($datosIncidencia);

        //Redireccionando
        return redirect('bypass/bypassMin')->with('mensaje', 'Abonado Incluido Exitosamente.');

        }

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

        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        unset($datosIncidencia['bypass']);

        Incidencia::insert($datosIncidencia);

        if ($vartmp == 1) {
            $var = BypasMin::where('id', $id)->get();
            BypasMin::destroy($var);
            return redirect('bypass/bypassMin')->with('mensaje', 'Abonado excluido exitosamente.');
        }
        else
            return redirect('incidencias')->with('mensaje', 'Registro agregado correctamente.');
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
            ->with('mensaje', 'REgistro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
          $post = Incidencia::find($id);
          $post->delete();
          return redirect()->route('incidencias.index')
            ->with('mensaje', 'Registro eliminado satisfactoriamente');
        }

    public function export()
    {
    
        return Excel::download(new IncidenciaExport, 'Incidencias.xlsx');
    
    }
}
