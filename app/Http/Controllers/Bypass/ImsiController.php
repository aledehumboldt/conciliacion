<?php

namespace App\Http\Controllers\Bypass;

use App\Http\Controllers\Controller;
use App\Models\BypasImsi;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ImsiController extends Controller
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
        if (Auth::user()->perfil == "SASM") {
            return $this->create();
        }
        
        $bypas_imsis = BypasImsi::select(
            'bypas_imsis.id as id',
            'bypas_imsis.ticket as ticket',
            'bypas_imsis.fecha as fecha',
            'users.nombre as usuario',
            'bypas_imsis.imsi as imsi',
            'bypas_imsis.observaciones as observaciones')
        ->join('users', 'bypas_imsis.usuario', '=', 'users.usuario')
        ->orderBy('id','desc')
        ->paginate();

        return view('bypass.imsi.index', compact('bypas_imsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        if(!$this->verify()) {
            return back();
        }

        return view('bypass.imsi.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //Validando parametros enviados
        $campos = [
            'ticket' => 'required|string',
            'inicio' => 'required|string',
            'imsi' => 'required|numeric',
            'observaciones' => 'required|string',
        ];

        $this->validate($request,$campos);

        //-------------------Bypass--------------
        //En caso de ser una exclusion vista SASM
        if (isset($request->excluir)) {
            //Agregando valores necesarios para Incidencia
            $request['descripcion'] = $request->observaciones;
            $request['solicitante'] = auth()->user()->perfil;
            $request['tipo'] = "requerimiento";
            
            //Buscando registro para realizar exclusion
            $bypass = BypasImsi::where('imsi',$request->imsi)->first();
            
            if(empty($bypass)) {
                return redirect()->route('bypassMin.index')
                ->withErrors('IMSI no existe en el listado.');
            }

            //Eliminando del array
            unset(
                $request['imsi'],
                $request['observaciones'],
            );

            return $this->destroy($request,$bypass->imsi);
        }

        //Sustituyendo valores necesarios
        $datosImsibypas = request()->except('_token', 'incluir');

         //Buscando registro para realizar inclusion
         $bypass = BypasImsi::where('imsi',$request->imsi)->first();
            
         if(!empty($bypass)) {
             return redirect()->route('bypassMin.index')
             ->withErrors('IMSI ya existe en el listado.');
         }

        //Agregando valores necesarios
        $datosImsibypas['usuario'] = auth()->user()->usuario;
        $datosImsibypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['fecha'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset(
            $datosImsibypas['inicio']
        );

        //Insertando la tabla Bypass IMSI
        BypasImsi::insert($datosImsibypas);
        //-------------------Bypass--------------

        //---------------Incidencia--------------
        //Agregando valores necesarios
        $datosImsibypas['inicio'] = date("Y-m-d H:i:s", strtotime($request->inicio));
        $datosImsibypas['fin'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['descripcion'] = $request->observaciones;
        $datosImsibypas['solicitante'] = auth()->user()->perfil;
        $datosImsibypas['responsable'] = $datosImsibypas['usuario'];
        $datosImsibypas['tipo'] = "requerimiento";

        //Eliminando del array
        unset(
            $datosImsibypas['usuario'],
            $datosImsibypas['imsi'],
            $datosImsibypas['observaciones'],
            $datosImsibypas['fecha']
        );

        $incidencia = Incidencia::where('ticket',$datosImsibypas['ticket'])
        ->first();

        //Insertando la tabla Incidencias
        if (empty($incidencia)) {
            Incidencia::insert($datosImsibypas);
        }
        //---------------Incidencia--------------
        
        //Redireccionando
        return redirect()->route('bypassImsi.index')
        ->with('mensaje', 'IMSI incluido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {

        $campos = [
            'imsi' => 'required|string',
        ];

        $this->validate($request,$campos);

        $bypas_imsis = BypasImsi::where('imsi',$request->imsi)->get();

        return view('bypass.imsi.consultar',compact('bypas_imsis'));
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
            'imsi' => 'required|numeric',
            'observaciones' => 'required|string',
        ];

        $this->validate($request,$campos);

        $datosImsibypas = request()->except('_token', 'editar', '_method');

        //Sustituyendo valores necesarios

        //Agregando valores necesarios
        $datosImsibypas['usuario'] = auth()->user()->usuario;
        $datosImsibypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        BypasImsi::where('id','=',$id)->update($datosImsibypas);
        
          return redirect()->route('bypassImsi.index')
            ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $imsi) {
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
        $imsi = BypasImsi::where('imsi',$imsi)->first();
        if(empty($imsi)) {
            return redirect()->route('bypassImsi.index')
            ->withErrors('IMSI no existe en el listado.');
        }
        else { $imsi->delete(); }

        $datosIncidencia = request()->except('_token', 'excluir');

        //Agregando valores necesarios
        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['responsable'] = auth()->user()->usuario;
        $newStart = date("Y-m-d H:i:s", strtotime($datosIncidencia['inicio']));
        $datosIncidencia['inicio'] = $newStart;
        $newEnd = date("Y-m-d H:i:s", strtotime($datosIncidencia['fin']));
        $datosIncidencia['fin'] = $newEnd;
        $datosIncidencia['tipo'] = "requerimiento";
        
        $incidencia = Incidencia::where('ticket',$datosIncidencia['ticket'])
        ->first();

        //Insertando la tabla Incidencias
        if (empty($incidencia)) {
            Incidencia::insert($datosIncidencia);
        }

        return redirect()->route('bypassImsi.index')
        ->with('mensaje', 'IMSI excluido exitosamente.');
    }
}

