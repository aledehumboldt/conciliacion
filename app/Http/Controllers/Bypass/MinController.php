<?php

namespace App\Http\Controllers\Bypass;

use App\Http\Controllers\Controller;
use App\Models\BypasMin;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreBypassMinRequest;
use Illuminate\Support\Facades\Validator;

class MinController extends Controller
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

        $datos['bypas_mins'] = BypasMin::orderBy('id','desc')->paginate();
        return view('bypass.min.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        if(!$this->verify()) {
            return back();
        }

        return view('bypass.min.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBypassMinRequest $request) {
        //-------------------Bypass--------------
        //En caso de ser una exclusion vista SA
        if (isset($request->excluir)) {
            //Agregando valores necesarios para Incidencia
            $numero = $request->codarea.$request->min;
            $request['descripcion'] = $request->observaciones; 
            $request['solicitante'] = auth()->user()->perfil;
            $request['tipo'] = "requerimiento";

            $request->validate([
                'inicio' => 'required|string|before_or_equal:now', 
              ], [
                'inicio.before_or_equal' => 'La fecha y hora deben ser menor igual a la del dia de hoy',
            ]);
            
            //Buscando registro para realizar exclusion
            $bypass = BypasMin::where('min',$numero)->first();
            
            if(empty($bypass)) {
                return redirect()->route('bypassMin.index')
                ->withErrors('Abonado no existe en el listado.');
            }

            //Eliminando del array
            unset(
                $request['codarea'],
                $request['min'],
                $request['observaciones'],
                $request['tcliente'],
            );

            //return $request;
            return $this->destroy($request,$bypass->min);
        }

        //Sustituyendo valores necesarios
        $datosMinbypas = $request->except('_token', 'incluir');
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['fecha'] = Carbon::now()->format('Y-m-d H:i:s');
        $request->validate([
            'inicio' => 'required|string|before_or_equal:now', 
          ], [
            'inicio.before_or_equal' => 'La fecha y hora deben ser menor igual a la del dia de hoy',
        ]);

        //Eliminando del array
        unset(
            $datosMinbypas['codarea'],
            $datosMinbypas['inicio']
        );

        //Insertando la tabla Bypass MIN
        $bypass = BypasMin::where('min',$datosMinbypas['min'])->first();
        if(!empty($bypass)) {
            return redirect()->route('bypassMin.index')
            ->with('mensaje', 'Abonado ya se encuentra incluido en el listado.');
        }
        BypasMin::insert($datosMinbypas);
        //-------------------Bypass--------------

        //---------------Incidencia------------------
        //Agregando valores necesarios
        $datosMinbypas['inicio'] = date("Y-m-d H:i:s", strtotime($request->inicio));
        $datosMinbypas['fin'] = Carbon::now()->format('Y-m-d_H:i:s');
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
            $datosMinbypas['tcliente'],
            $datosMinbypas['fecha']
        );

        $incidencia = Incidencia::where('ticket',$datosMinbypas['ticket'])
        ->first();

        //Insertando la tabla Incidencias
        if (empty($incidencia)) {
            Incidencia::insert($datosMinbypas);
        }
        //-------------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassMin.index')
        ->with('mensaje', 'Abonado incluido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {

        $campos = [
            'codigo' => 'required|string',
            'celular' => 'required|numeric',
        ];

        $this->validate($request,$campos);

        $vartmp = $request->codigo.$request->celular;

        $bypas_mins = BypasMin::where('min',$vartmp)->get();

        return view('bypass.min.consultar',compact('bypas_mins'));
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
        //return $request;
        $request->validate([
            'ticket' => 'required|numeric|between:3900000000,3909999999', 
            'codarea' => 'required|numeric',
            'observaciones' => 'required|string|min:6|max:250',
            'min' => 'required|numeric',
            'tcliente' => 'required|string|min:7|max:8',
          ]);

        $datosMinbypas = $request->except('_token', 'editar', '_method');

        Validator::extend('unique_min_codarea', function ($attribute, $value, $parameters, $validator) {
            $codarea = $validator->getData()['codarea'];
            $min = $validator->getData()['min'];
            $combinedValue = $codarea . $min;

            return BypasMin::where('min', $combinedValue)->doesntExist();
        });

        $validator = Validator::make($request->all(), [
            'min' => 'unique_min_codarea'
        ]);
        
        if ($validator->fails()) {
            session()->forget('errors');
            $validator->errors()->add('min', 'El abonado que intenta actualizar ya se encuentra en el listado.');

            return back()->withErrors($validator)->withInput();
        }
        //Sustituyendo valores necesarios
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosMinbypas['codarea']);

        //Actualizando el registro
        BypasMin::where('id','=',$id)->update($datosMinbypas);
        
        //Redireccionando
        return redirect()->route('bypassMin.index')
            ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $min) {
        
        //Validando los datos enviados
        $request->validate([
            'ticket' => 'required|numeric|between:3900000000,3909999999|unique:incidencias,ticket',
            'inicio' => 'required|string',
            'descripcion' => 'required|string|max:250',
            'solicitante' => 'required|string',
        ], [
            'ticket.unique' => 'Ya una solicitud ha sido procesada con este ticket',
        ]);

        //Eliminando de la tabla Bypass MIN
        $numero = BypasMin::where('min',$min)->first();
        if(empty($numero)) {
            return redirect()->route('bypassMin.index')
            ->withErrors('Abonado no existe en el listado.');
        }
        else { $numero->delete(); }
        
        $datosIncidencia = $request->except('_token', 'excluir');

        //Agregando valores necesarios
        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['responsable'] = auth()->user()->usuario;
        $datosIncidencia['inicio'] = date("Y-m-d H:i:s", strtotime($request->inicio));
        $datosIncidencia['fin'] = date("Y-m-d H:i:s", strtotime($request->fin));
        $datosIncidencia['tipo'] = "requerimiento";
  
        $incidencia = Incidencia::where('ticket',$datosIncidencia['ticket'])
        ->first();

        //Insertando la tabla Incidencias
        if (empty($incidencia)) {
            Incidencia::insert($datosIncidencia);
        }

        return redirect()->route('bypassMin.index')
        ->with('mensaje', 'Abonado excluido exitosamente.');
    }
}
