<?php

namespace App\Http\Controllers\Bypass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BypassController extends Controller
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

<<<<<<< HEAD:app/Http/Controllers/bypasController.php
        if(auth()->user()->perfil == "SA") {
            return redirect()->route('exclusiones.create');
        }

        $datos['exclusiones'] = Exclusione::where('fechae', '>=', now()->format('Y-m-d H:i:s'))->paginate();
        return view('exclusiones.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('exclusiones.crear');
=======
        return view('bypass.index');
    }

    public function show(Request $request) {
        return view('bypass.bypassMin.index', $request);
>>>>>>> e0fc267efb2b8815371f94839f3397e62e7f0dc4:app/Http/Controllers/Bypass/BypassController.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBypasMinRequest $request) {

        $this->validate($request,$campos);

        //Guardando datos del formulario
        $datosBypass = request()->except('_token', 'excluir');

        //Sustituyendo valores necesarios
        $fechae = Carbon::parse($datosBypass['fechae'])->format('Ymd');
        $celular = $datosBypass['codarea'].$datosBypass['celular'];

        //Agregando valores necesarios
        $datosBypass['usuario'] = auth()->user()->usuario;
        $datosBypass['fecha'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosBypass['min'] = $min;
        $datosBypass['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosBypass['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosBypass['codarea']);

        //Insertando la tabla
        Exclusione::insert($datosBypass);

        //Redireccionando
        return redirect('bypass')->with('mensaje', 'Abonado Excluido.');
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

        $abonado = $request->codareaB.$request->celularB;
        $exclusiones = Exclusione::where('celular',$abonado)->get();
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
