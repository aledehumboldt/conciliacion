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
    <h3 class="editor-toolbar-item">Gestionar Abonado del listado Bypass</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('bypassMin.storesa')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-container my-text-class">
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                    value="{{old('ticket')}}" placeholder="">
                <label for="ticket" class="form-label">Ingresa ticket</label>
            </div>
            <label for="min" class="form-label text-black">Celular</label>
            <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                <select name="codarea" id="codarea" class="custom-select" style="width:100px" required>
                    <option value="">Código</option>
                    <option value="416">0416</option>
                    <option value="426">0426</option>
                </select>
                <input type="text" autocomplete="off" name="min" id="min" value="{{old('min')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Recepcion de requerimiento</label>
                <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fin del requerimiento</label>
                <input type="text" autocomplete="off" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                this.type='text'">
            </div>
            <div class="mb-3">
                <select id="tcliente" name="tcliente" class="custom-select">
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
                <button type="submit" name="incluir" id="incluir" class="btn btn-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    Incluir abonado
                </button>
                <button type="submit" name="excluir" id="excluir" class="btn btn-secondary" value="exlcuir">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    Excluir abonado
                </button>
            </div>
        </div>
    </form>
@endsection