<?php

namespace App\Http\Controllers\Masivo_bypass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\bypassMinImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\BypasMin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class MinController extends Controller
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

        $datos['bypas_mins'] = BypasMin::orderBy('id','desc')->paginate();
        return view('bypass_masivo.min.index', $datos);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $exclusions = Excel::toCollection(new bypassMinImport, $file);
        $inclusions = Excel::toArray(new bypassMinImport, $file);
        
        //return $file2;
        if (isset($request->incluir)) {

            $campos = [
                'ticket' => 'numeric|min:10|max:10|starts_with:3900',
                'min' => 'numeric|min:10|max:10|regex:/^(426|416)/',
                'observaciones' => 'string',
                'tcliente' => 'string|min:7|max:8|in:PREPAGO,POSTPAGO',
            ];

            foreach($inclusions[0] as $inclusion){

                $validator = Validator::make($inclusion,$campos);

                if($validator->fails()){
                    return response($validator->messages(), 200);
                } else {
                    $data['ticket'] = $inclusion['ticket'];
                    $data['fecha'] = Carbon::now()->format('Y-m-d H:i:s');
                    $data['usuario'] = auth()->user()->usuario;
                    $data['min'] = $inclusion['numero'];
                    $data['observaciones'] = $inclusion['justificacion'];
                    $data['tcliente'] = $inclusion['tipocliente'];
                    
                    echo "<script>console.log(";
                    echo json_encode($inclusion);
                    echo ");</script>";
                    //BypasMin::insert($data);
                }
            }
            

            //return back()->with('mensaje', 'Importacion completada.');
            return true;
        }

        foreach($exclusions[0] as $exclusion){

            BypasMin::where('min', $exclusion[1])->delete();
        }

        return back()->with('mensaje', 'Depurados Correctamente');
    }

}
