<?php

namespace App\Http\Controllers;

use App\Models\BypasMin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateBypasMinRequest;
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
        $campos = [

            'ticket' => 'required|string',
            'fecha' => 'required|string',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string',
        ];

        $datosMinbypas = request()->except('_token', 'incluir');

        //Sustituyendo valores necesarios
        $min = $datosMinbypas['codarea'].$datosMinbypas['min'];

        //Agregando valores necesarios
        $datosMinbypas['usuario'] = auth()->user()->usuario;
        $datosMinbypas['min'] = $min;
        $datosMinbypas['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosMinbypas['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');

        //Eliminando del array
        unset($datosMinbypas['codarea']);

        //Insertando la tabla
        BypasMin::insert($datosMinbypas);

        //Redireccionando
        return redirect('bypass/bypassMin')->with('mensaje', 'Abonado Incluido Exitosamente.');

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
    public function destroy($id)
    {
          $post = BypasMin::find($id);
          $post->delete();
          return redirect()->route('bypass.bypassMin.index')
            ->with('mensaje', 'Abonado excluido satisfactoriamente');
        }
}
