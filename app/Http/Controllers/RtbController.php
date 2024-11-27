<?php

namespace App\Http\Controllers;

use App\Models\Rtb;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RtbController extends Controller
{
    protected function verify() {
        if (Auth::user()->perfil == "Conciliacion" 
        && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }

public function index(Request $request)
{
    $archivo = 'C:/laragon/www/conciliacion/pruebas/CRMPRGPROV_20241026n.txt';
    $contenido = file_get_contents($archivo);
    $filas = explode("\n", $contenido);
    $datos = [];

    foreach ($filas as $fila) {
        // Dividimos la línea en un array de campos
        $campos = explode(" ", $fila);

        // Verificamos si la línea tiene al menos 8 campos (uno por cada propiedad del modelo Rtb)
        if (count($campos) >= 8) {
            // Si tiene suficientes campos, creamos un array asociativo con los datos
            $datos[] = [
                'Min' => $campos[0],
                'Imsi' => $campos[1],
                'SimCard' => $campos[2],
                'Status' => $campos[3],
                'FechaActivacion' => $campos[4],
                'Plan' => $campos[5],
                'Nodo' => $campos[6],
                'TipoDispositivo' => $campos[7],
                // ... y así sucesivamente para los demás campos
            ];
        } else {
            // Si la línea no tiene suficientes campos, podemos:
            // 1. Ignorar la línea (descomenta la siguiente línea)
            // 2. Registrar un error en un log (descomenta la siguiente línea)
            // 3. Asignar valores por defecto a los campos faltantes
            // ...
            // log::error("Línea con menos de 8 campos: " . $fila);
        }
    }

    // Creamos la colección de modelos Rtb a partir de los datos válidos
    $rtbCollection = collect($datos)->map(function ($fila) {
        return new Rtb($fila);
    });

    if (request()->ajax()) {
        return FacadesDataTables::of($rtbCollection)->make(true);
    }
    return view('plataformas.index');
}
}
