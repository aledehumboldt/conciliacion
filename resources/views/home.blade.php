	@extends('layouts.bootstrap')

	@section('titulo', 'Inicio')

	@section('estilos')
	@endsection

	@section('encabezado')
	
	@endsection

	@section('contenido')
		<!-- Carousel Start --> 
		<div class="container-fluid mb-3">
			<div class="row px-xl-5">
				<div class="col-lg-8">
					<div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#header-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#header-carousel" data-slide-to="1"></li>
							<li data-target="#header-carousel" data-slide-to="2"></li>
							<li data-target="#header-carousel" data-slide-to="3"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item position-relative active" style="height: 430px;">
								<img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-1.jpg')}}" style="object-fit: cover;">
								<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
									<div class="p-3" style="max-width: 700px;">
										<h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Nuevo Ingreso?</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Contacta con el equipo de Aprovisionamiento para la creación de un nuevo usuario.</p>
										<a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('contactar.index') }}">Contactar</a>
									</div>
								</div>
							</div>
							<div class="carousel-item position-relative" style="height: 430px;">
								<img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-2.jpg')}}" style="object-fit: cover;">
								<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
									<div class="p-3" style="max-width: 700px;">
										<h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Olvidaste tu contraseña?</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Solicita el reestablecimiento de tu clave al equipo de Aprovisionamiento.</p>
										<a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('contactar.index') }}">Solicitar</a>
									</div>
								</div>
							</div>
							<div class="carousel-item position-relative" style="height: 430px;">
								<img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-3.jpg')}}" style="object-fit: cover;">
								<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
									<div class="p-3" style="max-width: 700px;">
										<h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Antes de excluir...</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Verifica si el abonado ya esta excluido hasta la fecha que requieres.</p>
										<a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('exclusiones.create') }}">Excluir</a>
									</div>
								</div>
							</div>
							<div class="carousel-item position-relative" style="height: 430px;">
								<img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-4.jpg')}}" style="object-fit: cover;">
								<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
									<div class="p-3" style="max-width: 700px;">
										<h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Primera vez?</h1>
										<p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Recuerda que debes ingresar con tu cédula y luego cambiar tu contraseña.</p>
										<a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('contactar.index') }}">Contactar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="product-offer mb-30" style="height: 200px;">
						<img class="img-fluid" src="{{asset('assets/offer-1.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Procesos de Conciliación</h6>
							<h3 class="text-white mb-3">Gestión Exclusiones</h3>
							<a href="{{route('exclusiones.index')}}" class="btn btn-secondary">Excluir</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 200px;">
						<img class="img-fluid" src="{{asset('assets/offer-2.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Tráfico Gris</h6>
							<h3 class="text-white mb-3">Gestión Bypass</h3>
							<a href="{{route('bypass.index')}}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Carousel End -->
	@endsection


