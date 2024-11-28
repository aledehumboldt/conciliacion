<?php

namespace App\Http\Controllers;

use App\Models\Exclusione;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExclusioneRequest;

class ExclusioneController extends Controller
{
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

        if(auth()->user()->perfil == "SASM") {
            return redirect()->route('exclusiones.create');
        }

        $exclusiones = Exclusione::where('fechae', '>=', now()->format('Y-m-d H:i:s'))
        ->orderBy('id', 'desc')->paginate();
        
        return view('exclusiones.index', compact('exclusiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('exclusiones.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExclusioneRequest $request) {
        //Guardando datos del formulario
        $datosExclusion = $request->except('_token', 'excluir');

        //Sustituyendo valores necesarios
        $fechae = Carbon::parse($datosExclusion['fechae'])->format('Ymd');
        $celular = $datosExclusion['codarea'].$datosExclusion['celular'];

        //Agregando valores necesarios
        $datosExclusion['usuario'] = auth()->user()->usuario;
        $datosExclusion['tecnologia'] = "GSM";
        $datosExclusion['fechac'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosExclusion['fechae'] = $fechae;
        $datosExclusion['celular'] = $celular;
        $datosExclusion['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosExclusion['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosExclusion['codarea']);

        //Insertando la tabla
        Exclusione::insert($datosExclusion);

        //Redireccionando
        return redirect('exclusiones')->with('mensaje', 'Abonado Excluido.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {
        //Validando valores del formulario
        $campos = [
            'codigo' => 'required|string',
            'celular' => 'required|numeric',
        ];

        $this->validate($request,$campos);

        $abonado = $request->codigo.$request->celular;

        $exclusiones = Exclusione::where('celular',$abonado)
        ->where('fechae', '>=', now()->format('Y-m-d H:i:s'))
        ->get();

        return view('exclusiones.consultar',compact('exclusiones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) {
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy() {
        //
    }
}
