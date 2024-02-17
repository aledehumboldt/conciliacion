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
      <div class="form-floating mb-3">
        <input type="text" autocomplete="off" name="solicitante" id="solicitante" class="form-control"
        value="{{ $incidencia->solicitante }}" required placeholder="">
        <label for="ticket" class="form-label text-secondary">Solicitante</label>
    </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="añadir" id="añadir" class="btn btn-secondary">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
                </svg>
                Actualizar Incidencia</button>
                <a href="{{route('incidencias.index')}}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                    Volver
                </a>
        </div>
    </div>
</form>
@endsection
