	@extends('layouts.app')

	@section('titulo', 'Gestión Bypass')

	@section('estilos')
	@endsection

	@section('encabezado')
	<h3>Gestión Tráfico Gris (Bypass)</h3>
	<div style="position: absolute; right: 2%;">
		<button type="button" class="btn btn-secondary rounded-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="¿Sabes qué es el Tráfico Gris?" data-bs-content="
		El llamado tráfico gris disfraza las llamadas internacionales como locales, evadiendo así los costos asociados y por ende, haciendo fraude al proveedor.">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
				<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94"/>
			</svg>
		</button>
	</div>
	@endsection

	@section('contenido')
		<div class="container-fluid mb-3">
			<div class="row px-xl-12">
                <div class="col-lg-6">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloMIN.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo MIN</h3>
							<a href="{{ route('bypassMin.index') }}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/ambos.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">MIN e IMSI</h3>
							<a href="{{ route('bypassAmbos.create') }}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloIMSI.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo IMSI</h3>
							<a href="{{ route('bypassImsi.index') }}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/whitelist.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Lista Blanca</h3>
							<a href="{{ route('bypassWhitelist.index') }}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection


