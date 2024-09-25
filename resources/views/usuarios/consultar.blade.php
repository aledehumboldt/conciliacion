@extends('layouts.app')

@section('titulo', 'Gestión Usuarios')

@section('estilos')
@endsection

@section('encabezado')
@include('layouts.partials.usuarios.modal_buscar')
    <h3 class="editor-toolbar-item">Gestión de Usuarios</h3>
<div style="position: absolute; right: 2%;">
    <button class="btn btn-secondary me-md-2" type="button" name="modalusers" id="modalusers"  data-toggle="modal" data-target="#modalusers">
        <svg class="bi"><use xlink:href="#search"/></svg>
    </button>
    <a href="{{route('usuarios.create')}}" class="btn btn-secondary">
        <svg class="bi"><use xlink:href="#person-plus-fill"/></svg>
        Crear Usuario
    </a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

        <table class="table">
            <thead>
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
                <tr>
                    @if(isset($users))
                    @foreach ($users as $user)
                    <tr>
                    <td style="display: none">{{$user->id}}</td>
                    <td>{{$user->nombre}}</td>
                    <td>{{$user->usuario}}</td>
                    <td>{{$user->creado_por}}</td>
                    <td>{{$user->estatus}}</td>
                    <td>{{$user->perfil}}</td>
                    <td>
                          <div style="display: flex; align-items: center;justify-content: center;">
                        <a href="{{route('usuarios.edit',$user->id)}}">
                            <button class="btn btn-secondary" title="Editar">
                                <svg class="bi"><use xlink:href="#pencil"/></svg>
                            </button>
                        </a>
                        <form action="{{route('usuarios.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button style="margin-left: 10px" type="submit" onclick="return confirm('¿Seguro desea suspender el usuario?')" value="Suspender" class="btn btn-danger" title="Suspender">
                                <svg class="bi"><use xlink:href="#eraser"/></svg>
                            </button>
                        </form>
                          </div>
                    </td>
                    <tr>                    
                    @endforeach                 
                    @else
                        <div class="alert alert-danger">Usuario no encontrado</div>
                    @endif
                </tr>
            </tbody>
        </table>
        <div class="text-center pt-1 mb-5 pb-1">
            <a href="{{route('usuarios.index')}}" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
                Volver
            </a>
        </div>
@endsection