@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

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
    <h3 class="editor-toolbar-item">Gestionar IMSI del listado Bypass</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('bypassImsi.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-container">
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                    value="{{old('ticket')}}" placeholder="">
                <label for="ticket" class="form-label text-secondary">Ingrese ticket</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="imsi" id="imsi" value="{{old('imsi')}}" class="form-control" placeholder="Ingrese IMSI" >
                <label for="min" class="form-label text-secondary">Ingrese IMSI</label>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Recepcion de requerimiento</label>
                <input type="text" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fin del requerimiento</label>
                <input type="text" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <label for="observaciones" class="form-label">Observaciones</label>
            <div class="form-floating mb-3">
                <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{old('observaciones')}}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="incluir" id="incluir" class="btn btn-secondary">
                    <svg class="bi"><use xlink:href="#store"/></svg>
                    Incluir abonado
                </button>
                <button type="submit" name="excluir" id="excluir" class="btn btn-secondary" value="exlcuir">
                    <svg class="bi"><use xlink:href="#store"/></svg>
                    Excluir abonado
                </button>
            </div>
        </div>
    </form>
@endsection