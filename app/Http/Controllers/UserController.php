<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

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
            'usuario' => 'required|numeric'
        ];

        $this->validate($request,$campos);

        $var = $request->usuario;

        $users = User::where('usuario', $var)->first();

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
    public function update(Request $request, $id) {

        $campos = [
            'nombre' => 'required|string|max:100',
            'usuario' => 'required|numeric|min:8',
            'perfil' => 'required|string|min:2|max:3',
        ];

        $this->validate($request,$campos);
        
        //Actualizando registro
        $datosUsuario = request()->except('_token', 'crear', '_method');
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
