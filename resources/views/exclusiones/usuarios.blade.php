@extends('layouts.bootstrap')

@section('titulo', 'Gestion Usuarios')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestion de Usuarios</h3>
<div style="position: absolute; right: 2%;">
    <a href="{{route('usuarios.create')}}" class="editor-toolbar-item btn btn-secondary">Crear Usuario</a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

        <table class="table">
            <thead class="table editor-textarea-editable">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Creado por</th>
                    <th>Estatus</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table editor-textarea-editable">
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->usuario}}</td>
                    <td>{{$usuario->creado_por}}</td>
                    <td>{{$usuario->estatus}}</td>
                    <td>{{$usuario->perfil}}</td>
                    <td style="display: flex; align-items: center;justify-content: center;">
                        <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-secondary">
                            Editar
                        </a>
                        |
                        <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" onclick="return confirm('¿Seguro desea suspender el usuario')" value="Suspender" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}
@endsection