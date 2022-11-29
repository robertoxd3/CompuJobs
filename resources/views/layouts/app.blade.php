<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
          <!--ANIMATE JS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- SWEET ALERT,JQUERY, FONT AWESOME -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="app">


        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-light ">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">

                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="list-group-item list-group-item-action py-2 ripple"
                                    aria-current="true">
                                    <i class="fa-solid fa-house me-3"></i><span>Iniciar</span>
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="list-group-item list-group-item-action py-2 mt-2 ripple" aria-current="true">
                                    <i class="fa-solid fa-right-to-bracket me-3"></i> <span>Registrarse</span>
                                </a>
                            @endif
                        @else

                        <a href="{{ route('home') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                            <i class="fa-solid fa-house me-3">
                                </i><span>Inicio</span>
                        </a>

                        <a href="{{ route('publicaciones') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                        <i class="fa-solid fa-comments me-3"></i><span>Publicaciones</span>
                        </a>

                        <a href="{{ route('profesionales') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                        <i class="fa-solid fa-user-tie me-3"></i><span>Profesionales</span>
                        </a>

                        <a href="{{ route('empresas') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                        <i class="fa-solid fa-building  me-3"></i><span>Empresas</span>
                        </a>

                        <a href="{{ url('oferta') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                        <i class="fa-solid fa-clipboard me-3"></i><span>Ofertas</span>
                        </a>

                        <a href="{{ url('ranking') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                        aria-current="true">
                        <i class="fa-solid fa-ranking-star me-3"></i><span>Ranking</span>
                        </a>

                            @if (auth()->user()->tipo_usuario == 'administrador')  
                            <a href="{{ url('categorias') }}" type="button" class="btn btn-outline-dark list-group-item list-group-item-action py-2 ripple" data-mdb-ripple-color="dark"
                            aria-current="true">
                            <i class="fa-solid fa-list me-3"></i><span>Profesiones</span>
                            </a>
                            @endif
                        @endguest
                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <!-- Container wrapper -->
                <div class="container-fluid mx-3">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Brand -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/img/logo.svg" width="45" height="40" alt="" loading="lazy" />
                        CompuJobs
                    </a>


                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item " hidden>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" hidden>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Avatar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                                    id="navbarDropdown" href="#" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ Auth::user()->foto }}" class="rounded-circle" height="35" alt=""
                                        loading="lazy" />
                                    <span class="ms-1 d-none d-sm-block"> {{ Auth::user()->name }}</span>
                                </a>
                                <ul style="position: absolute;" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" id="logout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); ">
                                            <i class="fa-solid fa-right-from-bracket me-3"></i>{{ __('Logout') }}
                                        </a></li>

                                    <li><a class="dropdown-item" href="{{ route('perfil', ['id' => Auth::user()->id]) }}">
                                            <i class="fa-solid fa-address-card me-3"></i>Mi Perfil
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->

        <main class="py-5 mt-5 h-100">
            @yield('content')

<section hidden>
    <hr width="80%" class="">
	<div class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
		<div class="col-md-4 d-flex align-items-center">
			<div class="lc-block text-center mb-3 mb-md-0">
				<a class="navbar-brand" href="https://library.livecanvas.com/sections/">
					<img class="img-fluid me-1" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="my brand" width="48px" height="48px">
				</a>

				<span editable="inline" class="text-muted">© 2022 CompuJobs</span>

			</div>
		</div>


		<div class="col-md-4 justify-content-end d-flex gap-3">
			<div class="lc-block">

				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" lc-helper="svg-icon" class="">
						<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
					</svg>
				</a>

			</div>
			<div class="lc-block">

				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
						<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
					</svg>
				</a>

			</div>
			<div class="lc-block">

				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
						<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"></path>
					</svg>
				</a>

			</div>
		</div>
	</div>
</section>
        </main>


        
    </div>




    <script>
        $(document).ready(function() {
            $("#logout").on("click", function() {
                Swal.fire({
                    title: "¿Seguro que quieres cerrar sesión?",
                    showCancelButton: true,
                    confirmButtonText: "Si",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
