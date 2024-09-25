@extends('layouts.app')
@section('titulo', 'Inclusión Bypass')

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
    <h3 class="editor-toolbar-item">Gestionar el listado Bypass</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('bypassAmbos.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-container">
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="" onkeypress='return validaNumericos(event)'>
                <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
            </div>
            <label for="min" class="form-label">Celular</label>
            <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                <select name="codarea" id="codarea" class="custom-select" style="width:100px" required>
                    <option value="">Código</option>
                    <option value="416">0416</option>
                    <option value="426">0426</option>
                </select>
                <input type="text" autocomplete="off" name="min" id="min" value="{{old('min')}}"
                class="form-control" placeholder="" pattern=".{7,7}" onkeypress='return validaNumericos(event)'>
            </div>
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="imsi" id="imsi" value="{{old('imsi')}}"
                class="form-control" placeholder="" pattern=".{15,15}" onkeypress='return validaNumericos(event)'>
                <label for="imsi" class="form-label text-secondary">IMSI</label>
            </div>
            <div class="mb-3">
                <label for="incio" class="form-label">Fecha inicio</label>
                <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Recepcion del requerimiento" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <label for="fin" class="form-label">Fecha fin</label>
                <input type="text" autocomplete="off" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Fin del requerimiento" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <select id="tcliente" name="tcliente" class="custom-select">
                    <option value="">Tipo de cliente</option>
                    <option value="PREPAGO">PREPAGO</option>
                    <option value="POSTPAGO">POSTPAGO</option>
                </select>
            </div>
            <label for="observaciones" class="form-label">Observaciones</label>
            <div class="mb-3">
                <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{old('observaciones')}}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="incluir" id="incluir" class="btn btn-secondary" value="incluir">
                    <svg class="bi"><use xlink:href="#store"/></svg>
                    Incluir abonado
                </button>
                <button type="submit" name="excluir" id="excluir" class="btn btn-secondary" value="excluir">
                    <svg class="bi"><use xlink:href="#store"/></svg>
                    Excluir abonado
                </button>
            </div>
        </div>
    </form>
@endsection