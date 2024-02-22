<?php

namespace App\Http\Controllers\Bypass;

use App\Http\Controllers\Controller;
use App\Models\BypasWhitelist;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BypasWhitelistController extends Controller
{
    /**
     * Verify if the user can see these views.
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

        //validando el perfil de usuario
        if (Auth::user()->perfil == "SA") {
            return $this->create();
        }

        $datos['bypas_mins'] = BypasWhitelist::orderBy('id','asc')->paginate();
        return view('bypass.bypassWhitelist.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        if(!$this->verify()) {
            return back();
        }

        return view('bypass.bypassWhitelist.crear');
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
            'observaciones' => 'required|string',
        ];

        $this->validate($request,$campos);

        //-------------------Bypass--------------
        //En caso de ser una exclusion vista SA
        if (isset($request->excluir)) {
            //Agregando valores necesarios para Incidencia
            $numero = $request->codarea.$request->min;
            $request['inicio'] = $request->fecha;
            $request['descripcion'] = $request->observaciones;
            $request['solicitante'] = auth()->user()->perfil;
            $request['tipo'] = "requerimiento";

            //Buscando registro para realizar exclusion
            $bypass = BypasWhitelist::where([
                ['min',$numero],
                ['ticket',$request->ticket]
            ])->first();

            //Eliminando del array
            unset(
                $request['codarea'],
                $request['min'],
                $request['fecha'],
                $request['observaciones'], 
            );

            //return $request;
            return $this->destroy($request,$bypass->id);
        }

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
        BypasWhitelist::insert($datosMinbypas);
        //-------------------Bypass--------------

        //---------------Incidencia--------------
        //Agregando valores necesarios
        $datosMinbypas['inicio'] = date("Y-m-d H:i:s", strtotime($request->fecha));
        $datosMinbypas['fin'] = $request->fecha;
        $datosMinbypas['descripcion'] = $request->observaciones;
        $datosMinbypas['solicitante'] = auth()->user()->perfil;
        $datosMinbypas['responsable'] = $datosMinbypas['usuario'];
        $datosMinbypas['tipo'] = "requerimiento";

        //Eliminando del array
        unset(
            $datosMinbypas['usuario'],
            $datosMinbypas['min'],
            $datosMinbypas['codarea'],
            $datosMinbypas['observaciones'],
            $datosMinbypas['fecha']
        );

        $incidencia = Incidencia::where('ticket',$datosMinbypas['ticket'])
        ->first();

        //Insertando la tabla Incidencias
        if (empty($incidencia)) {
            Incidencia::insert($datosMinbypas);
        }
        //---------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassWhitelist.index')
        ->with('mensaje', 'Abonado incluido exitosamente.');
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

        $bypas_mins = BypasWhitelist::where('min',$vartmp)->get();

        return view('bypass.bypassWhitelist.consultar',compact('bypas_mins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $campos = [

            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string',
        ];

        $this->validate($request,$campos);

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

        BypasWhitelist::where('id','=',$id)->update($datosMinbypas);
        
          return redirect()->route('bypassWhitelist.index')
            ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id) {
        //Eliminando de la tabla Bypass MIN
        $numero = BypasWhitelist::find($id);
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
        $datosIncidencia['responsable'] = auth()->user()->usuario;
        $newDate = date("Y-m-d H:i:s", strtotime($datosIncidencia['inicio']));

        $datosIncidencia['inicio'] = $newDate;
        
        $incidencia = Incidencia::where('ticket',$datosIncidencia['ticket'])
        ->first();

        //Agregando registro a Incidencia
        if (empty($incidencia)) {
            Incidencia::insert($datosIncidencia);
        }
        return redirect()->route('bypassWhitelist.index')
        ->with('mensaje', 'Abonado excluido exitosamente.');
    }
}
