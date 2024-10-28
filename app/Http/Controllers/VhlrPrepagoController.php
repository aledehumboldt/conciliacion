<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\vhlrprg;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class VhlrPrepagoController extends Controller
{

    protected function verify() {
        if (Auth::user()->perfil == "CYA"
        && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }


    public function index()
    {
        $archivo = 'C:\laragon\www\conciliacion\pruebas\vhlrprg.txt';
        $contenido = file_get_contents($archivo);
        $filas = explode("\n", $contenido);
        $datos = [];

        foreach ($filas as $fila) {
            $datos[] = explode(" ", $fila);
        }

        $rtbCollection = collect($datos)->mapWithKeys(function ($fila) {
            if (count($fila) >= 13) {
                return [$fila[0] => new vhlrprg([
                    'MSISDN' => $fila[0],
                    'IMSI' => $fila[1],
                    'CAT' => $fila[2],
                    'CURRENTNAM' => $fila[3],
                    'LOCK' => $fila[4],
                    'ODBIC' => $fila[5],
                    'TBS' => $fila[6],
                    'ODBOC' => $fila[7],
                    'ODBROAM' => $fila[8],
                    'OCSI' => $fila[9],
                    'TCSI' => $fila[10],
                    'GRPSCSI' => $fila[11],
                    'EPSPROFILEID' => $fila[12],
                ])];
            }
            return [];
        });

        $dataTable = DataTables::of($rtbCollection)->make(true);

        return view('plataformas.vhlrprg.index', compact('dataTable'));
    }
}           
