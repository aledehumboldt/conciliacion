<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('titulo') - {{config('app.name')}}</title>
  <link rel="icon" type="image/x-icon" href="{{asset('assets/1699301436808.png')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	 <link rel="stylesheet" href="{{asset('css/style.css')}}">
	 <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
	<!--<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>-->
	<style>
      .pagination {
      --bs-pagination-active-bg: #fd585f;
      --bs-pagination-active-border-color: #fd585f;
      --bs-pagination-color:#666666;
      --bs-pagination-hover-bg:#fd585f;
      --bs-pagination-hover-color: #070707;
      --bs-link-hover-color: #fd585f;
      }
    </style>
	@yield('estilos')
</head>
<body>
<!-- partial:index.partial.html -->
<div class="window">
	<header class="window-header">
		<nav class="navigation">
			<div class="navigation-top">
				@if (auth()->user()->estatus == "Activo")
					<a href="{{route('home')}}" class="navigation-item
					@if(route('home') == url()->current())
					active
					@endif
					">
				@else
					<a href="#" class="navigation-item">
				@endif
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 9.5L12 4L21 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M19 13V19.4C19 19.7314 18.7314 20 18.4 20H5.6C5.26863 20 5 19.7314 5 19.4V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="navigation-item-title">Inicio</span>
				</a>
				<a href="{{route('exclusiones.show')}}" class="navigation-item">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3Z" stroke="currentColor" stroke-width="1.5" />
						<path d="M9.75 9.75V21" stroke="currentColor" stroke-width="1.5" />
						<path d="M3 9.75H21" stroke="currentColor" stroke-width="1.5" />
					</svg>
					<span class="navigation-item-title">Excluir Abonados</span>
				</a>
				<a href="#" class="navigation-item">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.6954 7.18536L11.6954 11.1854L12.3046 9.81464L3.3046 5.81464L2.6954 7.18536ZM12.75 21.5V10.5H11.25V21.5H12.75ZM12.3046 11.1854L21.3046 7.18536L20.6954 5.81464L11.6954 9.81464L12.3046 11.1854Z" fill="currentColor" />
						<path d="M3 17.1101V6.88992C3 6.65281 3.13964 6.43794 3.35632 6.34164L11.7563 2.6083C11.9115 2.53935 12.0885 2.53935 12.2437 2.6083L20.6437 6.34164C20.8604 6.43794 21 6.65281 21 6.88992V17.1101C21 17.3472 20.8604 17.5621 20.6437 17.6584L12.2437 21.3917C12.0885 21.4606 11.9115 21.4606 11.7563 21.3917L3.35632 17.6584C3.13964 17.5621 3 17.3472 3 17.1101Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M7.5 4.5L16.1437 8.34164C16.3604 8.43794 16.5 8.65281 16.5 8.88992V12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="navigation-item-title">Exclusiones</span>

				</a>
				@if (auth()->user()->estatus == "Activo" && auth()->user()->perfil == "CYA")
					<a href="{{route('usuarios.index')}}" class="navigation-item
					@if(route('usuarios.index') == url()->current())
						active
						@endif
						">	
				@else
					<a href="#" class="navigation-item">
				@endif
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M8 21.1679V14L12 7L16 14V21.1679" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M8 14C8 14 9.12676 15 10 15C10.8732 15 12 14 12 14C12 14 13.1268 15 14 15C14.8732 15 16 14 16 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="navigation-item-title">Gestión Usuarios</span>

				</a>
				<a href="#" class="navigation-item navigation-item--notification">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 8.4C18 6.70261 17.3679 5.07475 16.2426 3.87452C15.1174 2.67428 13.5913 2 12 2C10.4087 2 8.88258 2.67428 7.75736 3.87452C6.63214 5.07475 6 6.70261 6 8.4C6 15.8667 3 18 3 18H21C21 18 18 15.8667 18 8.4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="navigation-item-title">Notificaciones</span>

				</a>
			</div>
			<div class="navigation-bottom">
				<a href="#" class="navigation-item">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M19.6224 10.3954L18.5247 7.7448L20 6L18 4L16.2647 5.48295L13.5578 4.36974L12.9353 2H10.981L10.3491 4.40113L7.70441 5.51596L6 4L4 6L5.45337 7.78885L4.3725 10.4463L2 11V13L4.40111 13.6555L5.51575 16.2997L4 18L6 20L7.79116 18.5403L10.397 19.6123L11 22H13L13.6045 19.6132L16.2551 18.5155C16.6969 18.8313 18 20 18 20L20 18L18.5159 16.2494L19.6139 13.598L21.9999 12.9772L22 11L19.6224 10.3954Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>

					<span class="navigation-item-title">Configuración</span>
				</a>
				<a href="#" class="navigation-item">
                    <img src="{{asset('assets/MOVILNET.jpg')}}" alt="logo">
					<span class="navigation-item-title">{{auth()->user()->nombre}}</span>
				</a>
			</div>
		</nav>
	</header>
	<main class="window-main">
		<div class="window-main-header">
			<ol class="breadcrumbs">
				<li class="breadcrumbs-item"><a href="#">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3Z" stroke="currentColor" stroke-width="1.5" />
							<path d="M9.75 9.75V21" stroke="currentColor" stroke-width="1.5" />
							<path d="M3 9.75H21" stroke="currentColor" stroke-width="1.5" />
						</svg>{{config('app.name')}}</a></li>
				<li class="breadcrumbs-item current"><a href="#">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4 21.4V2.6C4 2.26863 4.26863 2 4.6 2H16.2515C16.4106 2 16.5632 2.06321 16.6757 2.17574L19.8243 5.32426C19.9368 5.43679 20 5.5894 20 5.74853V21.4C20 21.7314 19.7314 22 19.4 22H4.6C4.26863 22 4 21.7314 4 21.4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M16 5.4V2.35355C16 2.15829 16.1583 2 16.3536 2C16.4473 2 16.5372 2.03725 16.6036 2.10355L19.8964 5.39645C19.9628 5.46275 20 5.55268 20 5.64645C20 5.84171 19.8417 6 19.6464 6H16.6C16.2686 6 16 5.73137 16 5.4Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M8 10L16 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M8 18L16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M8 14L12 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>

						@yield('titulo')</a></li>
			</ol>
			<div class="publish-actions">
				<div class="publish-info">
					<span>LAST EDITED<br />
						04 dic 2023</span>
				</div>
				<button class="button button--save">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
						<path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
						<path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
					</svg>
					Save
				</button>
				<button class="button button--schedule">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 4V2M15 4V6M15 4H10.5M3 10V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V10H3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M3 10V6C3 4.89543 3.89543 4 5 4H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M7 2V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M21 10V6C21 4.89543 20.1046 4 19 4H18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					Schedule
				</button>
				<button class="button button--publish">
					<a href="/logout" style="text-decoration:none">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" />
							<path d="M17.4995 6.34835C19.7975 5.80967 21.4447 5.87208 21.8376 6.66002C22.5686 8.12616 18.6797 11.5491 13.1515 14.3053C7.62327 17.0616 2.5492 18.1074 1.81821 16.6413C1.4263 15.8553 2.36234 14.5067 4.16701 13.0001" stroke="currentColor" stroke-width="1.5" />
						</svg>
						Salir
					</a>
				</button>
			</div>
		</div>
		<div class="window-main-body">
            <div class="editor">
                <div class="editor-toolbar">
                    @yield('encabezado')
                </div>
                <div class="editor-textarea">
                    @yield('contenido')
                </div>
            </div>
		</div>
	</main>
</div>
<!-- partial -->
  <script  src="{{asset('js/script.js')}}"></script>
  <script  src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
