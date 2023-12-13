	@extends('layouts.bootstrap')

	@section('titulo', 'Inicio')

		@section('encabezado')
		hola
		@endsection

<style>

.carousel-caption{
    position: absolute; 
    right: 15%;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: center;
	background-color: rgba(0, 0, 0, 0.7);
}

.carousel-item{
  	height: 60%;
}

.carousel-inner img{
  height: 100%;
  opacity: 0.8;																								
}

</style>

		@section('contenido')
		<div id="carouselExampleCaptions" class="carousel slide">
			<div class="carousel-indicators">
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img src="{{asset('assets/1.png')}}" alt="...">
				<div class="carousel-caption">
				  <h5>ffffff</h5>
				  <p>solicitud</p>
				</div>
			  </div>
			  <div class="carousel-item">
				<img src="{{asset('assets/2.png')}}" alt="...">
				<div class="carousel-caption">
				  <h5>¿Extravío de clave?</h5>
				  <p>Pídele al equipo de Aprovisionamiento el reestablecimiento de la misma, mediante el formato correspondiente a la solicitud</p>
				</div>
			  </div>
			  <div class="carousel-item">
				<img src="{{asset('assets/3.png')}}" alt="...">
				<div class="carousel-caption">
				  <h5>Para ti, usuario nuevo</h5>
				  <p>Es necesario realizar la solicitud de creación de usuario, para accerder a las distintas funcionalidades.</p>
				</div>
			  </div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Next</span>
			</button>
		  </div>
		@endsection


