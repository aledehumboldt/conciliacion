@extends('layouts.bootstrap')
@section('titulo', 'Gestión Exclusiones')

@section('estilos')
<style>
    form {
        width: 100%;
        height: 30vh;
        display: flex;
        align-items: center !important;
        justify-content: center !important;
    }
    .form-container {
        width: 400px;
    }
</style>
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestion de Exclusiones</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('exclusiones.query') }}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <label for="celularB" class="form-label">Celular</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
            <select name="codareaB" id="codaeraB" class="form-control" style="width:100px">
                <option value="">Código</option>
                <option value="416">0416</option>
                <option value="426">0426</option>
            </select>
            <input type="text" name="celularB" id="celularB" value="{{old('celularB')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
        </div>
        <div class="text-center pt-1 mb-3 pb-1">
            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                Buscar abonado
            </button>
            <a href="{{route('exclusiones.create')}}" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">Volver</a>
        </div>
    </div>
</form>
@endsection
