@extends('layouts.bootstrap')

@section('titulo', 'Gestión bypass abonados')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestion trafico gris(bypass) abonados</h3>
<div style="position: absolute; right: 2%;">
    <a href="#" class="editor-toolbar-item btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
          </svg>
    Gestionar Abonados</a>
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
                </tr>
            </thead>
            <tbody class="table editor-textarea-editable">
                @foreach ($bypas_mins as $bypaMin)
                <tr>
                    <td>{{$bypasMin->id}}</td>
                    <td>{{$bypasMin->ticket}}</td>
                    <td>{{$bypasMin->fecha}}</td>
                    <td>{{$bypasMin->usuario}}</td>
                    <td>{{$bypasMin->min}}</td>
                    <td>{{$bypasMin->observaciones}}</td>
                    <td>{{$bypasMin->tcliente}}</td>
                    <td style="display: flex; align-items: center;justify-content: center;">
                        <a href="{{route('bypassMin.index',$bypasMin->id)}}" class="btn btn-secondary" title="Editar" id="editar" name="editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </a>
                          <form action="{{ route('bypassMin.index', $bypasMin->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="eliminar" name="eliminar" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                                </svg>
                            </button>
                         </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$bypassMin->links()}}
@endsection