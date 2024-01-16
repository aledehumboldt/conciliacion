@extends('layouts.bootstrap')

@section('titulo', 'Aprovisionar')

@section('estilos')
@endsection

@section('encabezado')

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div class="container-fluid mb-3">
            <div class="row px-xl-12">
                <div class="">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="{{asset('assets/soloMIN.jpg')}}" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Conexion de Abonados</h6>
                            <a href="{{ route('aprovisionamientos.conexion') }}" class="btn btn-secondary">Gestionar</a>
                        </div>
                    </div>
                <div class="">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="{{asset('assets/soloIMSI.jpg')}}" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Desconexion de Abonados</h6>
                            <a href="{{ route('aprovisionamientos.desconexion') }}" class="btn btn-secondary">Gestionar</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </div>

@endsection