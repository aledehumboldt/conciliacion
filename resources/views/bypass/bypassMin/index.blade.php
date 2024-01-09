@extends('layouts.bootstrap')
@extends('layouts.modal2')


@section('titulo', 'Gestión bypass abonados')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestion trafico gris abonados</h3>
<div style="position: absolute; right: 2%;">
    <button class="btn btn-secondary me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Abonado en Trafico Gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bypass.bypassMin.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-container">
                    <label for="celular" class="form-label">Celular</label>
                    <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                    <select name="codarea" id="codarea" class="form-control" style="width:100px">
                    <option value="">Código</option>
                    <option value="416">0416</option>
                    <option value="426">0426</option>
                </select>
                <input type="text" name="celular" id="celular" value="{{old('min')}}" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
                    </div>
                        <button type="submit" class="btn btn-secondary" name="buscar" id="buscar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
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
        @include('layouts.modal4')
        <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#exampleModal4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
          </svg>
    Incluir Abonado</button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
        <table class="table">
            <thead class="table editor-textarea-editable">
                <tr>
                    <th>#</th>
                    <th>Ticket</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Min</th>
                    <th>Observaciones</th>
                    <th>Tipo de cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table editor-textarea-editable">
                @foreach ($bypas_mins as $bypas_min)
                <tr>
                    <td>{{$bypas_min->id}}</td>
                    <td>{{$bypas_min->ticket}}</td>
                    <td>{{$bypas_min->fecha}}</td>
                    <td>{{$bypas_min->usuario}}</td>
                    <td>{{$bypas_min->min}}</td>
                    <td>{{$bypas_min->observaciones}}</td>
                    <td>{{$bypas_min->tcliente}}</td>
                    @include('layouts.modal3')
                    <td style="display: flex; align-items: center;justify-content: center;">
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <button type="submit" class="btn btn-secondary" type="button" name="editar" id="editar"  data-toggle="modal" data-target="#exampleModal3{{$bypas_min->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </button>
                    </div>
                    <div style="display: flex; align-items: center;justify-content: center;">
                            <button type="submit" class="btn btn-danger me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                                </svg>
                                Excluir Abonado
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$bypas_mins->links()}}
@endsection