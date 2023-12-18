<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ResetController extends Controller {
    public function index() {
        return view('auth.password.reset');
    }

    public function update(Request $request) {
        //Validando formulario
        $campos = [
            'clave' => 'required|min:8',
            'nueva-clave' => 'required|min:8|confirmed',
        ];

        $this->validate($request,$campos);

        //Actualizando contraseña
        $usuario = User::find(auth()->user()->id);
        $usuario->clave = md5($request['nueva-clave']);
        $usuario->estatus = "Activo";
        $usuario->save();
        
        //Redireccionando
        Session::flush();

        Auth::logout();

        return redirect('/login')->withErrors('Contraseña actualizada.');
    }

    public function edit($id) {
        $usuario = User::find($id);
        $usuario->clave = md5($usuario->usuario);
        $usuario->estatus = "Iniciado";
        $usuario->save();

        return redirect('usuarios')->with('mensaje', 'Contraseña reestablecida.');
    }
}
