@extends('layouts.bootstrap')
@section('titulo', 'Gestion Exclusiones')

@section('estilos')
<style>
    form {
        width: 100%;
        height: 90vh;
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
    <h3 class="editor-toolbar-item">Gestion de Exclusiones</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('exclusiones.show') }}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="Ingresar ticket">
            <label for="ticket" class="form-label">Ingresa ticket</label>
        </div>
        <label for="celular" class="form-label">Celular</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
            <select name="codarea" id="codaera" class="form-control" style="width:100px">
                <option value="">Código</option>
                <option value="416">0416</option>
                <option value="426">0426</option>
            </select>
            <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
        </div>
        <div class="form-floating mb-3">
            <input type="date" name="fechae" id="fechae" class="form-control"
                value="{{old('fechae')}}">
            <label for="fechae" class="form-label">Fecha fin de exclusión</label>
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
            <textarea name="observaciones" id="observaciones" cols="35" rows="5" >{{old('observaciones')}}</textarea>
        </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="excluir" id="excluir" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">Excluir Abonado</button>
        </div>
    </div>
</form>
@endsection
