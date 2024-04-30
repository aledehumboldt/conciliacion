@extends('layouts.app')
@section('titulo', 'Creación Incidencia')

@section('estilos')
<style>
    form {
        width: 100%;
        display: flex;
        align-items: center !important;
        justify-content: center !important;
    }
    .form-container {
        margin-top: 30px;
        width: 400px;
    }
</style>
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Crear incidencia o Requerimiento</h3> 
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('incidencias.store', 0)}}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="" autocomplete="off">
            <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
        </div>
        <div class="mb-3">
            <label for="inicio" class="form-label">Fecha Inicio</label>
            <input type="text" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>        
        <div class="mb-3">
            <label for="fin" class="form-label">Fecha Fin</label>
            <input type="text" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
        <label for="descripcion" class="form-label">Descripcion</label>
        <div class="form-floating mb-3">
          <textarea name="descripcion" id="descripcion" cols="36" rows="5">{{old('descripcion')}}</textarea>
      </div>
      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-control custom-select">
            <option value="">Seleccione</option>
            <option value="incidencia">Incidencia</option>
            <option value="requerimiento">Requerimiento</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="solicitante" class="form-label">Solicitante</label>
        <select name="solicitante" id="solicitante" class="form-control custom-select">
            <option value="">Seleccione</option>
            <option value="CYA">CYA</option>
            <option value="Soporte de Averias">Soporte de Averias</option>
        </select>
    </div>
        <div class="text-center">
            <button type="submit" name="agregar" id="agregar" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#store"/></svg>
                Añadir Incidencia
            </button>
            <a href="{{route('incidencias.index')}}" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>  
                Volver
            </a>
        </div>
    </div>
</form>
@endsection
