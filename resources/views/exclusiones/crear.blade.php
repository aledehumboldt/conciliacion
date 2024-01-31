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
    <h3 class="">Excluir Abonado de Conciliación</h3>
    <div style="position: absolute; right: 2%;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            Buscar abonado
        </button>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar en Exclusiones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exclusiones.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-container">
                        <label for="celularB" class="form-label">Celular</label>
                        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                            <select name="codigo" id="codigo" class="custom-select" style="width:100px">
                                <option value="">Código</option>
                                <option value="416">0416</option>
                                <option value="426">0426</option>
                            </select>
                            <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
                        </div>
                        <button type="submit" class="btn btn-secondary" name="buscar" id="buscar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                            Buscar abonado
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{ route('exclusiones.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="Ingresar ticket">
            <label for="ticket" class="form-label">Ingresa ticket</label>
        </div>
        <label for="celular" class="form-label">Celular</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
            <select name="codarea" id="codaera" class="custom-select" style="width:100px">
                <option value="">Código</option>
                <option value="416">0416</option>
                <option value="426">0426</option>
            </select>
            <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
        </div>
        <div class="mb-3">
            <label for="fechae" class="form-label">Fin de exclusión</label>
            <input type="text" name="fechae" id="fechae" class="form-control" value="{{old('fechae')}}" placeholder="Día/Mes/Año" onfocus="this.type='date'" onblur="
            this.type='text'" max="{{date(('Y-m-d'),strtotime('+3 months'))}}">
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
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="excluir" id="excluir" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                Excluir Abonado</button>
                @if (auth()->user()->perfil == "CYA")
                    <a href="{{route('exclusiones.index')}}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                        </svg>
                        Volver
                    </a>
                @endif
        </div>
    </div>
</form>
@endsection
