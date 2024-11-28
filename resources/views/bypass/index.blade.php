	@extends('layouts.app')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	@section('titulo', 'Gestión Bypass')

	@section('estilos')
	@endsection

	@section('encabezado')
	
	<h3 class="editor-toolbar-item">Gestión Tráfico Griss (Bypass)</h3>

	<div style="position: absolute; right: 2%;">
		<button type="button" class="btn btn-secondary rounded-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="¿Sabes qué es el Tráfico Gris?" data-bs-content="
		El llamado tráfico gris disfraza las llamadas internacionales como locales, evadiendo así los costos asociados y por ende, haciendo fraude al proveedor.">
			<svg class="bi"><use xlink:href="#question-circle"/></svg>
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
							<div style="position: absolute; bottom: 20%;">
								<a href="{{ route('bypassMin.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5"/>
									</svg>
									Individual
								</a>
								<a href="{{ route('minMasivo.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm6 0h-5v1h5z"/>
									</svg>
									Masivo
								</a>
							</div>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/ambos.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">MIN e IMSI</h3>
							<div style="position: absolute; bottom: 20%;">
								<a href="{{ route('bypassAmbos.create') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5"/>
									</svg>
									Individual
								</a>
								<a href="{{ route('ambosMasivo.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm6 0h-5v1h5z"/>
									</svg>
									Masivo
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-offer mb-30" style="height: 300px;">
						<img class="img-fluid" src="{{asset('assets/soloIMSI.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Solo IMSI</h3>
							<div style="position: absolute; bottom: 20%;">
								<a href="{{ route('bypassImsi.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5"/>
									</svg>
									Individual
								</a>
								<a href="{{ route('imsiMasivo.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm6 0h-5v1h5z"/>
									</svg>
									Masivo
								</a>
							</div>
						</div>
					</div>
					<div class="product-offer mb-30" style="height: 300px;">
						@if (auth()->user()->perfil != "SASM")
						<img class="img-fluid" src="{{asset('assets/whitelist.jpg')}}" alt="">
						<div class="offer-text">
							<h6 class="text-white text-uppercase">Gestión Tráfico Gris</h6>
							<h3 class="text-white mb-3">Lista Blanca</h3>
							<div style="position: absolute; bottom: 20%;">
								<a href="{{ route('bypassWhitelist.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5"/>
									</svg>
									Individual
								</a>
								<a href="{{ route('whitelistMasivo.index') }}" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm6 0h-5v1h5z"/>
									</svg>
									Masivo
								</a>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
@endsection