<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exclusione;
use Illuminate\Http\Request;

class ExclusioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $datos['usuarios'] = User::where('estatus','<>', 'Suspendido')->paginate();
        return view('exclusiones.usuarios', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('exclusiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $campos = [
            'nombre' => 'required|string|max:100',
            'usuario' => 'required|numeric|min:8',
            'perfil' => 'required|string|min:2|max:3',
        ];

        $this->validate($request,$campos);

        $datosUsuario = request()->except('_token', 'crear');
        $datosUsuario['clave'] = md5(request()->usuario);
        User::insert($datosUsuario);
        return redirect('exclusiones/usuarios')->with('mensaje', 'Usuario agregado.');
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        return view('exclusiones.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $usuario = User::findOrFail($id);
        return view('exclusiones.edit', compact('usuario'));
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
        return redirect('exclusiones/usuarios')->with('mensaje', 'Usuario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario) {
        $usuario->estatus = 'Suspendido';
        $usuario->save();
        return redirect('exclusiones/usuarios')->with('mensaje', 'Usuario suspendido.');
        //return $usuario;
    }

    public function excluir () {
        return view('exclusiones.index');
    }
}
