@extends('layouts.app')

@section('titulo', 'Gestión Usuarios')

@section('estilos')
@endsection

@section('encabezado')
    <h3>Gestion de Usuarios</h3>
<div style="position: absolute; right: 2%;">
    <a href="{{route('usuarios.create')}}" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
        </svg>
        Crear Usuario
    </a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

        <table class="table">
            <thead class="table">
                <tr>
                    <th style="display: none">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Creado por</th>
                    <th>Estatus</th>
                    <th>Perfil</th>
                    <th style="text-align: center">Acciones</th>
                </tr>
            </thead>
            <tbody class="table">
                @foreach ($usuarios as $usuario)
                <tr>
                    <td style="display: none">{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->usuario}}</td>
                    <td>{{$usuario->creado_por}}</td>
                    <td>{{$usuario->estatus}}</td>
                    <td>{{$usuario->perfil}}</td>
                    <td style="display: flex; align-items: center;justify-content: center;">
                        <a href="{{route('usuarios.edit',$usuario->id)}}">
                            <button class="btn btn-secondary" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </a>
                        <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('¿Seguro desea suspender el usuario?')" value="Suspender" class="btn btn-danger" title="Suspender">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}
@endsection