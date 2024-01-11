	@extends('layouts.bootstrap')

	@section('titulo', 'Gestión Bypass')

	@section('estilos')
	@endsection

	@section('encabezado')
	<h3>Gestión Tráfico Gris (Bypass)</h3>
	@endsection

	@section('contenido')
		<div class="container-fluid mb-3">
			<div class="row px-xl-12">
                <div class="">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloMIN.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo MIN</h3>
							<a href="{{ route('bypassMin.index') }}" class="btn btn-secondary">Gestionar</a>
						</div>
					</div>
				<div class="">
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
		</div>
	@endsection


