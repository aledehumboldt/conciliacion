@extends('layouts.app')

@section('titulo', 'Gestión Incidencias')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestión Incidencias y Requerimientos</h3>
<div>
    <button class="btn btn-secondary" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
        <svg class="bi"><use xlink:href="#search"/></svg>
        Consultar
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Incidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('incidencias.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-container">
                        <div class="mb-3">
                            <input type="text" autocomplete="off" name="ticket" id="ticket" value="{{old('ticket')}}" class="form-control" placeholder="Ingrese ticket">
                        </div>
                        <button type="submit" class="btn btn-secondary" name="buscar" id="buscar">
                            <svg class="bi"><use xlink:href="#search"/></svg>
                        Consultar
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
    <a href="{{route('incidencias.create')}}" class="editor-toolbar-item btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg>
        Cargar
    </a>
     
    <a href="{{route('incidencias.export')}}" class="editor-toolbar-item btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
        </svg>
        Generar Reporte
    </a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

    <div class="mb-3">
        <form action="#" enctype="multipart/form-data" method="get">
            @csrf
            <label for="selectCategory">Tipo:</label>
            <select id="selectCategory" name="selectCategory" class="form-control custom-select" style="width: 200px">
                <option value="ambos">Ambos</option>
                <option value="incidencia">Incidencias</option>
                <option value="requerimiento">Requerimientos</option>
            </select>
            <label for="selectEstatus">Estatus:</label>
            <select id="selectEstatus" name="selectEstatus" class="form-control custom-select" style="width: 200px">
                <option value="ambos">Ambos</option>
                <option value="a">Abiertos</option>
                <option value="c">Cerrados</option>
            </select>
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
        <!-- <div class="mb-3">
            <label for="busqueda">Busqueda Avanzada:</label>
            <form action="#" enctype="multipart/form-data" method="get">
                <input type="text" class="form-controler" id="busqueda" name="busqueda">
                <button type="submit" class="btn btn-secondary form-controler-button">Buscar</button>
            </form>
        </div> -->
    </div>
    {{$incidencias->appends(request()->query())->links()}}
    <table class="table" id="fbody">
        <thead>
            <tr>
                <th style="display: none">#</th>
                <th>Ticket</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Solicitante</th>
                <th>Responsable</th>
                <th style="text-align: center">Acciones</th>
            </tr>
        </thead>
        <tbody class="table">
            @foreach ($incidencias as $incidencia)
            <tr>
                <td style="display: none">{{$incidencia->id}}</td>
                <td>{{$incidencia->ticket}}</td>
                <td>{{$incidencia->inicio}}</td>
                <td>{{$incidencia->fin}}</td>
                <td>{{$incidencia->descripcion}}</td>
                <td>{{ucwords($incidencia->tipo)}}</td>
                <td>{{$incidencia->solicitante}}</td>
                <td>{{$incidencia->responsable}}</td>
                <td>
                    <div style="display: flex; align-items: center;justify-content: center;">
                    <a href="{{route('incidencias.edit',$incidencia->id)}}">
                        <button class="btn btn-secondary" title="Editar" id="editar" name="editar">
                            <svg class="bi"><use xlink:href="#pencil"/></svg>
                        </button>
                    </a>
                        <form action="{{ route('incidencias.destroy', $incidencia->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button style="margin-left: 10px" type="submit" class="btn btn-danger" id="eliminar" name="eliminar" title="Eliminar" onclick="return confirm('¿Seguro desea eliminar este registro?')">
                            <svg class="bi"><use xlink:href="#eraser"/></svg>
                        </button>
                        </form>
                        </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$incidencias->appends(request()->query())->links()}}

@endsection