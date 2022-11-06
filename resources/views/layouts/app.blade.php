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
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white ">
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
                            <a href="{{ route('home') }}" class="list-group-item list-group-item-action py-2 ripple"
                                aria-current="true">
                                <i class="fa-solid fa-house me-3"></i><span>Inicio</span>
                            </a>
                            <a class="list-group-item list-group-item-action py-2 ripple"
                                href="{{ route('publicaciones') }}">
                                <i class="fa-solid fa-comments me-3"></i><span>Publicaciones</span>
                            </a>

                            <a class="list-group-item list-group-item-action py-2 ripple"
                                href="{{ route('profesionales') }}">
                                <i class="fa-solid fa-user-tie me-3"></i><span>Profesionales</span>
                            </a>

                            <a class="list-group-item list-group-item-action py-2 ripple" href="{{ url('oferta') }}">
                                <i class="fa-solid fa-user-tie me-3"></i><span>Ofertas</span>
                            </a>
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
                        {{ config('app.name', 'Laravel') }}
                    </a>


                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Avatar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                                    id="navbarDropdown" href="#" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="/img/foto.png" class="rounded-circle" height="35" alt=""
                                        loading="lazy" />
                                    <span class="ms-1 d-none d-sm-block"> {{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
