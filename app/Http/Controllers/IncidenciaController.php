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
        $queryBuilder = Incidencia::whereBetween('inicio', [$dateFrom, $dateTo]);

        if($request->ajax()){
            $data = Incidencia::select('*')->get();
            return FacadesDataTables::of($data)->addIndexColumn()->addColumn('action', function($data){
                $button = '<div style="display: flex; align-items: center;justify-content: center;"><button class="edit btn btn-secondary me-md-2" name="edit" id="'.$data->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></button>';
                $button .= '<button class="delete btn btn-danger me-md-2" name="delete" id="'.$data->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16"><path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/></svg></button></div>';
                
                return $button;
            })
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
