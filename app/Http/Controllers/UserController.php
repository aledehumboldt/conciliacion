<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
        ->orderBy('id','desc')->paginate();

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
    public function update(Request $request, $id) {

        $request->validate([
            'nombre' => [
                'required',
                'regex:/^[a-zA-Z-áéíóóú\s]+$/',
                'max:40'
            ],
            'usuario' => [
                'required',
                'numeric',
                'digits:8',
                Rule::unique('users')->ignore($id)
            ],
            'perfil' => [
                'required_if:perfil,CYA',
                'string',
                'min:2',
                'max:3'
            ]
            ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre debe contener solo letras siy espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 20 caracteres.',
            'usuario.required' => 'El campo cedula es obligatorio.',
            'usuario.unique' => 'Esta cedula ya se encuentra registrada',
            'usuario.numeric' => 'El campo cedula debe ser un número.',
            'usuario.digits' => 'El campo cedula debe tener mínimo 8 caracteres',
            'perfil.required' => 'El campo perfil es obligatorio.',
            'perfil.string' => 'El campo nombre debe ser una cadena.',
            'perfil.min' => 'El campo perfil debe tener mínimo 2 caracteres.',
            'perfil.max' => 'El campo perfil debe tener maximo 3 caracteres.'
        ]);
        
        //Actualizando registro
        $datosUsuario = $request->except('_token', 'crear', '_method');
        $datosUsuario['created_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        $datosUsuario['updated_at'] = Carbon::now()->format('Y-m-d_H:i:s');
        User::where('id','=',$id)->update($datosUsuario);

        //Buscando registro actualizado y redireccionando

        return back()->with('mensaje', 'Se realizaron exitosamente los cambios.');

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
