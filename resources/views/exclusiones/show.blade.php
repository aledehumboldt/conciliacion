@extends('layouts.app')

@section('titulo', 'Gestion Exclusiones')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-title">Gestion de Exclusiones</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div class="form-container">
        <div  class="form-floating mb-3">
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="" placeholder="Ingresar nombre">
            <label for="nombre" class="form-label">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="usuario" id="usuario" value=""  class="form-control" placeholder="Ingresar cédula">
            <label for="usuario" class="form-label">Cédula</label>
        </div>
        <input type="hidden" name="estatus" id="estatus" value="">
        <div class="mb-3">
            <select id="perfil" name="perfil" class="form-control" >
                <option value="">Selecciona el área</option>
                <option value="SA"
                @isset($usuario->perfil)
                    @if ($usuario->perfil == "SA") selected @endif
                @endisset
                >Soporte de Averías</option>
                <option value="CYA"
                @isset($usuario->perfil)
                    @if ($usuario->perfil == "CYA") selected @endif
                @endisset
                >Aprovisionamiento</option>
            </select>
          </div>
        <input type="hidden" name="clave" id="clave" value="">
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="crear" id="crear" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">Excluir</button>
        </div>
    </div>
@endsection
