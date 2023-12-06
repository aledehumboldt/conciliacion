<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login (LoginRequest $request) {

        $credentials = $request->getCredentials();
    
        $user = User::where([
            'usuario' => $credentials['usuario'],
            'clave' => md5($credentials['clave'])
        ])->first();

        if($user) {
            if($user->estatus == 'Suspendido') {
               return view('auth.login')->withErrors('Usuario suspendido');
            }

            Auth::guard()->login($user, $request->has('remember'));

            $this->authenticated($request, $user);

            if(auth()->user()->estatus == 'Iniciado') {
                return redirect('/password')->with('mensaje','Por favor cambie su contraseña');
            }

            return redirect('/');
        }

        return view('auth.login')->withErrors('Inicio fallido');
    }

    public function show() {
        if (Auth::check()) {
            return view('home');
        }

        return view('auth.login');
    }

    public function authenticated(Request $request, $user) {
        return redirect('/');
    }
}
