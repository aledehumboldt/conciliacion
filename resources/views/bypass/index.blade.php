	@extends('layouts.bootstrap')

	@section('titulo', 'Inicio')

	@section('estilos')
	@endsection

	@section('encabezado')
	<h3>Gestión Tráfico Gris (Bypass)</h3>
	@endsection

	@section('contenido')
		<!-- Carousel Start -->
		<div class="container-fluid mb-3">
			<div class="row px-xl-12">
                <div class="col-lg-6">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloMIN.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo MIN</h3>
							<a href="{{url('bypass/create/min')}}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/ambos.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">MIN e IMSI</h3>
							<a href="{{url('bypass/create/ambos')}}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloIMSI.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo IMSI</h3>
							<a href="{{url('bypass/create/imsi')}}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/whitelist.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Lista Blanca</h3>
							<a href="{{url('bypass/create/whitelist')}}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Carousel End -->
	@endsection


