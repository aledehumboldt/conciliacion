<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Incidencia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IncidenciaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class IncidenciaController extends Controller
{

    protected function verify() {
        if (Auth::user()->perfil == "Conciliacion" 
        && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        if(!$this->verify()) {
            return back();
        }

        if($request->ajax()){
            $data = Incidencia::select(
                'incidencias.id as id',
                'incidencias.ticket as ticket',
                'incidencias.inicio as inicio',
                'incidencias.fin as fin',
                'incidencias.descripcion as descripcion',
                'incidencias.tipo as tipo',
                'incidencias.solicitante as solicitante',
                'users.nombre as responsable')
            ->join('users', 'incidencias.responsable', '=', 'users.usuario')
            ->orderBy('id','desc');

            return FacadesDataTables::of($data)
            ->addColumn('index', function ($data) {
                return $data->id; // Use ID for indexing
            })
            ->addColumn('action', function($data) {
                $editUrl = route('incidencias.edit', $data->id); // Use route helper for cleaner URL generation

                return view('layouts.partials.buttons', compact('editUrl', 'data')); // Pasa los datos al partial
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('incidencias.index');
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
     */
    public function store(Request $request) {

        $campos = [
            'ticket' => 'required|integer|between:3900000000,3900999999',
            'inicio' => 'required|string',
            'descripcion' => 'required|string|max:250',
            'tipo' => 'required|string',
            'solicitante' => 'required|string',
        ];

        $this->validate($request,$campos);

        $datosIncidencia = request()->except('_token', 'agregar');

        $datosIncidencia['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosIncidencia['responsable'] = auth()->user()->usuario;
        $newStart = date("Y-m-d H:i:s", strtotime($datosIncidencia['inicio']));
        $datosIncidencia['inicio'] = $newStart;

        if (isset($datosIncidencia['fin'])) {
            $newEnd = date("Y-m-d H:i:s", strtotime($datosIncidencia['fin']));
            $datosIncidencia['fin'] = $newEnd;
        }

        $incidencia = Incidencia::where('ticket',$datosIncidencia['ticket'])->first();

        //Validando si el ticket ya existe
        if (!empty($incidencia)) {
            return redirect()->route('incidencias.create')
            ->withErrors('El ticket ya posee un registro.');
        }
        //Insertando la tabla Incidencias
        Incidencia::insert($datosIncidencia);
       
        return redirect()->route('incidencias.create')
        ->with('mensaje', 'Registro agregado correctamente.');
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
            'ticket' => 'required|numeric|min:10|max:10',
            'inicio' => 'required|string',
            'descripcion' => 'required|string|max:250',
            'tipo' => 'required|string',
            'solicitante' => 'required|string',
        ]);

        $newStart = date("Y-m-d H:i:s", strtotime($request->inicio));
        if (isset($request->fin)) {
            $newEnd = date("Y-m-d H:i:s", strtotime($request->fin));
        }

        $incidencia = Incidencia::find($id);

        $request['inicio'] = $newStart;
        if (isset($newEnd)) {
            $request['fin'] = $newEnd;
        }

        $incidencia = Incidencia::where('ticket',$request['ticket'])->first();

        //Validando si el ticket ya existe
        if (!empty($incidencia)) {
            return redirect()->route('incidencias.index')
            ->withErrors('El ticket ya posee un registro.');
        }

        $incidencia->update($request->all());

        return redirect()->route('incidencias.index')
        ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $com = Incidencia::findOrFail($id);
        $com->delete();

        return redirect()->route('incidencias.index')
            ->with('mensaje', 'Registro eliminado.');
    }

    public function export() {
    
        return Excel::download(new IncidenciaExport, 'Incidencias.xlsx');
    
    }
}
