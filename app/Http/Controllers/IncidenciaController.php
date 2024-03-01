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
        if (Auth::user()->perfil == "CYA" 
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

        $mes = date('m');
        $anio = date('Y');
        $dateFrom = $anio."-".$mes."-01 00:00:00";
        $dateTo = $anio."-".$mes."-31 23:59:59";
        $incidencias = Incidencia::select('*')->get();

        if($request->ajax()){
            $data = Incidencia::select('*')->get();
            return FacadesDataTables::of($data)->addIndexColumn()->addColumn('action', function($data){
                $button = '<div style="display: flex; align-items: center;justify-content: center;"><a href="/incidencias/'.$data->id.'/edit"><button class="btn btn-secondary" title="Editar" id="editar" name="editar"><svg class="bi"><use xlink:href="#pencil"/></svg></button></a>';
                $button .= '<button type="submit" class="btn btn-danger me-md-2" style="margin-left: 15px" type="button" name="delete" id="delete" data-toggle="modal" data-target="#formModal'.$data->id.'"><svg class="bi"><use xlink:href="#eraser"/></svg></button></div>';
                
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('incidencias.index', compact('incidencias'));
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
            'ticket' => 'required|string|min:10|max:10',
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
            'ticket' => 'required|string|min:10|max:10',
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

          $incidencia->update($request->all());

          return redirect()->route('incidencias.index')
            ->with('mensaje', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $com = Incidencia::where('id',$request->id)->delete();
        return Response()->json($com);
    }

    public function export() {
    
        return Excel::download(new IncidenciaExport, 'Incidencias.xlsx');
    
    }
}
