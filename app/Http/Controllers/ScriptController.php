<?php

namespace App\Http\Controllers;

class ScriptController extends Controller
{
    public function ejecutar()
    {
        // Aquí ejecutarás el script Bash
        exec('sh C:/laragon/www/conciliacion/pruebas/sc_hola.sh');

        // Puedes redirigir o mostrar un mensaje al usuario
        return redirect()->back()->with('success', 'Script ejecutado correctamente');
    }
}
