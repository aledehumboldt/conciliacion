@extends('layouts.app')
@section('titulo', 'Exclusión Abonado')

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
    <h3 class="editor-toolbar-item">Excluir Abonado de Conciliación</h3>
    <div style="position: absolute; right: 2%;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
            <svg class="bi"><use xlink:href="#search"/></svg>
            Buscar abonado
        </button>
        <button type="button" class="btn btn-secondary rounded-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Si excluyes una línea..." data-bs-content="
		Esta no se verá afectada por los cambios que realiza la Conciliación en las plataformas. Es importante contar con la solicitud de un coordinador o mayor, y su respectivo ticket.">
			<svg class="bi"><use xlink:href="#question-circle"/></svg>
		</button>
    </div>

<!-- Modal, boton de busqueda-->
@include('layouts.partials.exclusiones.consulta')

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('exclusiones.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="" maxlength="10" onkeypress='return validaNumericos(event)'>
            <label for="ticket" class="form-label text-secondary" required>Ingresa ticket</label>
        </div>
        <label for="celular" class="form-label">Celular</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
            <select name="codarea" id="codaera" class="custom-select" style="width:100px" required>
                <option value="">Código</option>
                <option value="416">0416</option>
                <option value="426">0426</option>
            </select>
            <input type="text" autocomplete="off" name="celular" id="celular" value="{{old('celular')}}" class="form-control"
            placeholder="Ingrese abonado" pattern=".{7,7}" maxlength="7" onkeypress='return validaNumericos(event)' required>
        </div>
        <div class="mb-3">
            <label for="fechae" class="form-label">Fin de exclusión</label>
            <input type="text" autocomplete="off" name="fechae" id="fechae" class="form-control" value="{{old('fechae')}}" placeholder="Día/Mes/Año" onfocus="this.type='date'" onblur="
            this.type='text'" max="{{date(('Y-m-d'),strtotime('+3 months'))}}" required>
        </div>
        <div class="mb-3">
            <select id="tcliente" name="tcliente" class="custom-select" required>
                <option value="" >Tipo de cliente</option>
                <option value="PREPAGO">PREPAGO</option>
                <option value="POSTPAGO">POSTPAGO</option>
            </select>
          </div>
          <label for="observaciones" class="form-label">Observaciones</label>
          <div class="form-floating mb-3">
            <textarea name="observaciones" id="observaciones" cols="35" rows="5" required>{{old('observaciones')}}</textarea>
        </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <h6>Todos los campos son obligatorios.</h6>
            <button type="submit" name="excluir" id="excluir" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                Excluir Abonado</button>
              
                @if (auth()->user()->perfil == "CYA")
                    <a href="{{route('exclusiones.index')}}" class="btn btn-secondary">
                        <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
                        Volver
                    </a>
                @endif
        </div>
    </div>
</form>

@endsection
