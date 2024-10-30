@extends('layouts.app')
   
    @section('titulo', 'Gestion Invisibles_Ki')
   


    @section('estilos')
    

    @endsection


    @section('encabezado')
    <h3 class="editor-toolbar-item"> Inclusion/Exclusion Invisibles_Ki</h3>
    <div style="position: absolute; right: 2%;">

        <form action="{{ route('imsi_kis.create') }}" method="GET">
            @csrf  <button type="submit" href: class="btn btn-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up"
           viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5"/>
              </svg>
              Incluir IMSI
            </button>
          </form>
            
    </div>
   
   
    @endsection
@section('contenido')


@include('layouts.partials.messages')




<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Ticket</th>
        <th>Fecha</th>
        <th>IMSI</th>
        <th>Observaciones</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody  class="table table-bordered">
        @foreach ($imsis_kis as $imsi_ki)
                <tr>
                    <td>{{$imsi_ki->id}}</td>
                    <td>{{$imsi_ki->ticket}}</td>
                    <td>{{$imsi_ki->fecha}}</td>
                    <td>{{$imsi_ki->imsi}}</td>
                    <td>{{$imsi_ki->observaciones}}</td>
                    @include('layouts.partials.imsiki.modal_editar_individual_ki')
                    <td>
                            <div style="display: flex; align-items: center;justify-content: center;">
                            <a href="{{ route('imsi_ki.edit', $imsi_ki->id) }}" class="btn btn-primary btn-sm"><svg class="bi"><use xlink:href="#pencil"/></svg>Editar</a>
                           
                            <form action="{{ route('imsi-kis.destroy', $imsi_ki->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 10px;" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')"><svg class="bi"><use xlink:href="#eraser"/></svg></button>
                            </form>
                        
                    </td>
                </tr>
                    
                   
               
                @endforeach
    </tbody>
</table>






@endsection    