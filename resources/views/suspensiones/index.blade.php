@extends('layouts.bootstrap')
@section('titulo', 'Suspension y Reactivacion')

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
    <h3 class="editor-toolbar-item">Gestion suspensiones de abonados</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="#" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-container">
            <div class="form-floating mb-3">
                <input type="text" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="">
                <label for="ticket" class="form-label">Ingresa ticket</label>
            </div>
            <label for="min" class="form-label">Celular</label>
            <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                <select name="codarea" id="codarea" class="form-control" style="width:100px" required>
                    <option value="">Código</option>
                    <option value="416">0416</option>
                    <option value="426">0426</option>
                </select>
                <input type="text" name="min" id="min" value="{{old('min')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
            </div>
            <label for="imsi" class="form-label">IMSI</label>
            <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                <input type="text" name="imsi" id="imsi" value="{{old('imsi')}}" class="form-control" placeholder="Ingrese imsi" pattern=".{15,15}">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="text" name="fecha" id="fecha" class="form-control" value="{{old('fecha')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <select id="tcliente" name="tcliente" class="form-control" >
                    <option value="">Tipo de cliente</option>
                    <option value="PREPAGO">Prepago</option>
                    <option value="POSTPAGO">Postpago</option>
                </select>
            </div>
            <label for="observaciones" class="form-label">Observaciones</label>
            <div class="form-floating mb-3">
                <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{old('observaciones')}}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="incluir" id="incluir" class="btn btn-secondary" value="incluir">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reception-4" viewBox="0 0 16 16">
                        <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Suspender abonado
                </button>
                <button type="submit" name="excluir" id="excluir" class="btn btn-secondary" value="exlcuir">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reception-0" viewBox="0 0 16 16">
                        <path d="M0 13.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m4 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m4 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m4 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Reactivar abonado
                </button>
            </div>
        </div>
    </form>
@endsection