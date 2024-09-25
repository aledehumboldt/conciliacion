<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
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
    public function index() {
        if(!$this->verify()) {
            return back();
        }

        $usuarios = User::where('estatus','<>', 'Suspendido')
        ->orderBy('id','asc')->paginate();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        if(!$this->verify()) {
            return back();
        }

        return view('usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request) {

        $datosUsuario = $request->except('_token', 'crear');
        $datosUsuario['clave'] = md5(request()->usuario);
        $datosUsuario['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosUsuario['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        User::insert($datosUsuario);
        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Usuario agregado.');
    }

    /**
     * Display the specified resource.
    */
    public function show(Request $request) {

        $campos = [
             'busqueda' => 'required',
        ];

        $this->validate($request,$campos);

        $busqueda = $request->busqueda;

        $users = User::where('usuario', 'like', "%$busqueda%")
                    ->orWhere('nombre', 'like', "%$busqueda%")
                    ->get();

        return view('usuarios.consultar',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {

        $usuario = User::findOrFail($id);
        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id) {

        //Actualizando registro
        $datosUsuario = $request->except('_token', 'crear', '_method');
        $datosUsuario['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosUsuario['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        User::where('id','=',$id)->update($datosUsuario);

        //Buscando registro actualizado y redireccionando
        $usuario = User::findOrFail($id);

        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Usuario actualizado.');

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario) {
        if(!$this->verify()) {
            return back();
        }

        $usuario->estatus = 'Suspendido';
        $usuario->save();

        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Usuario suspendido.');
    }
}
