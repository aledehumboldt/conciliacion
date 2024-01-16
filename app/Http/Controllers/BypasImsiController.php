<?php

namespace App\Http\Controllers;

use App\Models\BypasImsi;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BypasImsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $datos['bypas_imsis'] = BypasImsi::orderBy('id','asc')->paginate();
        return view('bypass.bypassImsi.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$this->verify()) {
            return back();
        }

        return view('bypass.bypassImsi.crear');
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
            'imsi' => 'required|numeric',
            'observaciones' => 'required|string',
        ];

        $this->validate($request,$campos);

        //-------------------Bypass--------------
        //Sustituyendo valores necesarios
        $datosImsibypas = request()->except('_token', 'incluir');

        //Agregando valores necesarios
        $datosImsibypas['usuario'] = auth()->user()->usuario;
        $datosImsibypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');


        //Insertando la tabla Bypass MIN
        BypasImsi::insert($datosImsibypas);
        //-------------------Bypass--------------

        //-------------------Incidencia--------------
        //Agregando valores necesarios
        $datosImsibypas['inicio'] = $request->fecha;
        $datosImsibypas['fin'] = $request->fecha;
        $datosImsibypas['descripcion'] = $request->observaciones;
        $datosImsibypas['solicitante'] = auth()->user()->perfil;

        //Eliminando del array
        unset($datosImsibypas['usuario'],$datosImsibypas['imsi'],$datosImsibypas['observaciones'],$datosImsibypas['fecha']);

        //Insertando la tabla Incidencias
        Incidencia::insert($datosImsibypas);
        //-------------------Incidencia--------------
        
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

        $bypas_imsis = BypasImsi::where('min',$campos)->get();

        return view('bypass.bypassImsi.consultar',compact('bypas_imsis'));
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
            'imsi' => 'required|numeric',
            'observaciones' => 'required|string',
        ];

        $datosImsibypas = request()->except('_token', 'editar', '_method');

        //Sustituyendo valores necesarios

        //Agregando valores necesarios
        $datosImsibypas['usuario'] = auth()->user()->usuario;
        $datosImsibypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosImsibypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        BypasImsi::where('id','=',$id)->update($datosImsibypas);
        $bypas_min = BypasImsi::findOrFail($id);
          return redirect()->route('bypassImsi.index')
            ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {       //Eliminando de la tabla Bypass MIN
            $imsi = BypasImsi::find($id);
            $imsi->delete();

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

            return redirect()->route('bypassImsi.index')
            ->with('mensaje', 'IMSI excluido exitosamente.');
        }
}

