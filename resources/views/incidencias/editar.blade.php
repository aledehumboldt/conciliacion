@extends('layouts.app')
@section('titulo', 'Edición Incidencia')

@section('estilos')
<style>
    form {
        width: 100%;
        display: flex;
        align-items: center !important;
        justify-content: center !important;
    }
    .form-container {
        margin-top: 55px;
        width: 400px;
    }
</style>
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Edicion de incidencia o Requerimiento</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('incidencias.update', $incidencia->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control" placeholder="" value="{{ $incidencia->ticket }}" required>
            <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
        </div>
        <div class="mb-3">
            <label for="inicio" class="form-label">Fecha Inicio</label>
            <input type="datetime-local" name="inicio" id="inicio" class="form-control" value="{{ $incidencia->inicio }}" required placeholder="Día/Mes/Año">
        </div>        
        <div class="mb-3">
            <label for="fin" class="form-label">Fecha Fin</label>
            <input type="datetime-local" name="fin" id="fin" class="form-control" value="{{ $incidencia->fin }}" placeholder="Día/Mes/Año">
        </div>
        <label for="descripcion" class="form-label">Descripcion</label>
        <div class="form-floating mb-3">
          <textarea name="descripcion" id="descripcion" cols="36" rows="5" required>{{ $incidencia->descripcion }}</textarea>
      </div>
        <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control custom-select">
                <option value="">Seleccione</option>
                <option value="incidencia" @if ($incidencia->tipo == "incidencia") selected @endif>Incidencia</option>
                <option value="requerimiento" @if ($incidencia->tipo == "requerimiento") selected @endif>Requerimiento</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="solicitante" class="form-label">Solicitante</label>
            <select name="solicitante" id="solicitante" class="form-control custom-select">
                <option value="">Seleccione</option>
                <option value="CYA" @if ($incidencia->solicitante == "CYA") selected @endif>CYA</option>
                <option value="Soporte de Averias" @if ($incidencia->solicitante == "Soporte de Averias") selected @endif>Soporte de Averias</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="responsable" class="form-label text-secondary">Responsable</label>
            <input type="text" disabled name="responsable" id="responsable" class="form-control" value="{{ $incidencia->responsable }}">
        </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="añadir" id="añadir" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#store"/></svg>
                Actualizar Incidencia
            </button>
            <a href="{{route('incidencias.index')}}" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
                Volver
            </a>
        </div>
    </div>
</form>
@endsection
