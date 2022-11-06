@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ $user->foto }}" alt="avatar" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                                <h5 class="my-3">{{ $user->name }}</h5>
                                <p class="text-muted mb-1">Tipo Usuario: {{ $user->tipo_usuario }}</p>
                                <p class="text-muted mb-4">{{ $user->pais }}</p>
                                <a href="/cv/{{ auth()->user()->id }}" class="btn btn-primary">Descargar CV</a>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">

                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Habilidades</span>
                                </p>
                                @foreach ($user->habilidads as $habilidad)
                                    <p class="mb-1" style="font-size: .77rem;">{{ $habilidad->nombre_habilidad }}</p>
                                @endforeach

                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary"
                                    href="{{ route('habilidades.create', ['id' => Auth::user()->id]) }}">
                                    Añadir Habilidad
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telefono</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->telefono }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Dirección</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->direccion }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Profesión</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profesion->nombre_categoria }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Documento Unico</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->documento_unico }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Trabajos
                                                Anteriores</span>
                                        </p>
                                        @if (count($user->trabajos) > 0)
                                            @foreach ($user->trabajos as $trabajo)
                                                <p class="mb-1" style="font-size: .77rem;">{{ $trabajo->nombre_trabajo }}
                                                </p>
                                            @endforeach
                                        @else
                                            <p class="mb-1" style="font-size: .77rem;">Sin trabajos por mostrar.
                                            </p>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-primary"
                                            href="{{ route('trabajos.create', ['id' => Auth::user()->id]) }}">
                                            Añadir trabajo
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Idiomas</span>
                                        </p>
                                        @if (count($user->idiomas) > 0)
                                            @foreach ($user->idiomas as $idioma)
                                                <p class="mb-1" style="font-size: .77rem;">{{ $idioma->nombre_idioma }}
                                                </p>
                                            @endforeach
                                        @else
                                            <p class="mb-1" style="font-size: .77rem;">Sin idiomas por mostrar.
                                            </p>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-primary"
                                            href="{{ route('idiomas.create', ['id' => Auth::user()->id]) }}">
                                            Añadir idioma
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h3>Usuarios Seguidos</h3>
                @if ($seguidosUsuario[0] != null)
                    @foreach ($seguidosUsuario as $seguido)
                        <ul class="list-group list-group-light">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $seguido->foto }}" alt="" style="width: 45px; height: 45px"
                                        class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $seguido->name }}</p>
                                        <p class="text-muted mb-0">{{ $seguido->email }}</p>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show', $seguido->id) }}"><i
                                        class="fas fa-user ms-2"></i></i> Ver Perfil</a>
                            </li>
                        </ul>
                    @endforeach
                @else
                    <span>¡No sigues a nadie!</span>
                @endif
            </div> <!-- end container-->
        </section>

    </section>
@endsection
