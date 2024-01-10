<?php

namespace App\Http\Controllers;

use App\Models\BypasMin;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BypasMinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
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
        $datos['bypas_mins'] = BypasMin::paginate();
        return view('bypass.bypassMin.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$this->verify()) {
            return back();
        }

        return view('bypass.bypassMin.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validando parametros enviados
        $campos = [
            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string',
        ];

        $this->validate($request,$campos);

        //-------------------Bypass--------------
        //Sustituyendo valores necesarios
        $datosMinbypas = request()->except('_token', 'incluir');
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosMinbypas['codarea']);

        //Insertando la tabla Bypass MIN
        BypasMin::insert($datosMinbypas);
        //-------------------Bypass--------------

        //-------------------Incidencia--------------
        //Agregando valores necesarios
        $datosMinbypas['inicio'] = $request->fecha;
        $datosMinbypas['fin'] = $request->fecha;
        $datosMinbypas['descripcion'] = $request->observaciones;
        $datosMinbypas['solicitante'] = auth()->user()->perfil;

        //Eliminando del array
        unset($datosMinbypas['usuario'],$datosMinbypas['min'],$datosMinbypas['codarea'],$datosMinbypas['observaciones'],$datosMinbypas['tcliente'],$datosMinbypas['fecha']);

        //Insertando la tabla Incidencias
        Incidencia::insert($datosMinbypas);
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassMin.index')->with('mensaje', 'Abonado incluido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {

        $campos = [
            'codarea' => 'required|string',
            'min' => 'required|string',
        ];

        $this->validate($request,$campos);

        $vartmp = $request->codarea.$request->min;

        $bypas_mins = BypasMin::where('min',$vartmp)->get();

        return view('bypass.bypassMin.consultar',compact('bypas_mins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [

            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string',
        ];

        $datosMinbypas = request()->except('_token', 'editar', '_method');

        //Sustituyendo valores necesarios
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosMinbypas['codarea']);

        BypasMin::where('id','=',$id)->update($datosMinbypas);
        $bypas_min = BypasMin::findOrFail($id);
          return redirect()->route('bypass.bypassMin.index')
            ->with('mensaje', 'Inclusion Abonado Actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {       //Eliminando de la tabla Bypass MIN
            $numero = BypasMin::find($id);
            $numero->delete();

            //Validando los datos enviados
            $campos = [
                'ticket' => 'required|string|min:10|max:10',
                'inicio' => 'required|string',
                'descripcion' => 'required|string|max:250',
                'solicitante' => 'required|string',
            ];
    
            $this->validate($request,$campos);

            $datosIncidencia = request()->except('_token', 'excluir');

            //Agregando valores necesarios
            $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
            $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
            
            //Agregando registro a Incidencia
            Incidencia::insert($datosIncidencia);

            return redirect()->route('bypassMin.index')
            ->with('mensaje', 'Abonado excluido exitosamente.');
        }
}
