<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        $credentials = $request->getCredentials();

        $user = User::where('usuario', $credentials['usuario'])->first();

        if ($user) {
            if ($user->estatus == 'Suspendido') {
                return view('auth.login')->withErrors('Usuario suspendido');
            }

            if (Hash::check($credentials['clave'], $user->password)) {
                // Autenticación exitosa
                // ...
            } else {
                return view('auth.login')->withErrors('Contraseña incorrecta');
            }
        } else {
            return view('auth.login')->withErrors('Usuario no encontrado');
        }
    }
}