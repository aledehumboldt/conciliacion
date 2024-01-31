@extends('layouts.errors')

@section('titulo', 'Error Interno del Servidor')

@section('estilos')
@endsection

@section('encabezado')

<h3>Error 401: Error interno del servidor.</h3>
@endsection

@section('contenido')
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="carousel-item position-relative active" style="height: 430px;">
                <img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-7.jpg')}}" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¡Ups...!</h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Parece que hubo un error interno en el servidor.</p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('home') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection