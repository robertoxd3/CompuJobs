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
                                <p class="text-muted mb-1">{{ $user->tipo_usuario }}</p>
                                <p class="text-muted mb-4">{{ $user->pais }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    @if (!$user->siguiendo)
                                        <a class="btn btn-primary"
                                            href="{{ route('seguir', ['id' => Auth::user()->id, 'idseguido' => $user->id]) }}">
                                            Seguir
                                        </a>
                                    @else
                                        <a class="btn btn-primary"
                                            href="{{ route('seguir', ['id' => Auth::user()->id, 'idseguido' => $user->id]) }}">
                                            Dejar de seguir
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">

                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Habilidades</span>
                                </p>

                                @foreach ($user->habilidads as $habilidad)
                                    <div class="row">
                                        <div class="col mt-3">
                                            <span class="mb-1" style="font-size: .77rem;">{{ $habilidad['nombre_habilidad'] }}</span>
                                        </div>
                                        <div class="col mt-3">
                                          <a class="btn btn-success btn-sm"
                                              href="{{ route('puntuar', ['id' => $habilidad['id']]) }}">
                                              Puntuar
                                          </a>
                                        </div>
                                      </div>
                                @endforeach
                                {{-- <p class="mb-1" style="font-size: .77rem;">Web Design</p>

                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>

                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p> --}}

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
                                @if ($user->tipo_usuario == 'profesional')
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
                                @endif
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($user->tipo_usuario == 'empresa') 
                <div class="row animate__animated animate__backInLeft mt-3" >
                    <h2 class="rfs-25 fw-bolder">Ofertas de este usuario.</h2>
                    @if ($oferta->count() > 0)
                    @foreach ($oferta as $oferta)
                    <div class="col-xl-12 col-md-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                {{ ++$loop->index  }}
                              <div class="align-self-center">
                                <img class="rounded-circle shadow-1-strong me-3" width="65" height="65" src="{{$user->foto}}"
                                alt="avatar"  />
                              </div>
                              <div>
                                <h4>{{ $oferta->titulo }}</h4>
                                <p class="mb-0"><b>Empresa:</b> {{ $user->name}}</p>
                                <p class="mb-0"><b>Rango Salarial:</b>  ${{ $oferta->rango_salarial}}</p>
                                <p class="mb-0"><b>Cargo:</b>  {{ $oferta->cargo}}</p>
                                
                              </div>
                            </div>
                            <div class="align-self-center">
                              <a class="btn btn-sm btn-dark"
                              href="{{ route('oferta.show', $oferta->id) }}"><i class="fa-solid fa-eye"></i> Ver Más</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach 
                    @else
                        <span>¡No Tiene ninguna oferta!</span>
                    @endif
                </div>
                @endif
            </div>
        </section>

    </section>
@endsection
