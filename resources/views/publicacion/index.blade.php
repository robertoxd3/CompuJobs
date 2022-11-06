@extends('layouts.app')

@section('template_title')
    Publicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <h1 id="card_title" class="text-center">
                    {{ __('Publicacion') }}
                </h1>

                <div class="small d-flex justify-content-end">
                    <a href="{{ route('publicacion.create') }}" class="btn btn-primary btn-md float-right"
                        data-placement="left">
                        {{ __('Create New') }}
                    </a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif



        @foreach ($publicacion as $publicacion)
            <section>
                <div class="container my-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-9 col-xl-7">
                            <div class="d-flex flex-start mb-4">
                                <img class="rounded-circle shadow-1-strong me-3" src="{{ auth()->user()->foto }}"
                                    alt="avatar" width="65" height="65" />
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="small d-flex justify-content-end">
                                            {{ $publicacion->created_at->diffForHumans() }}</div>
                                        <div class="">
                                            <h5>Usuario: {{ $publicacion->id_user }}
                                                @foreach ($usuarios as $usuario)
                                                    @if ($usuario->id == $publicacion->id_user)
                                                        {{ $usuario->name }}
                                                    @endif
                                                @endforeach
                                            </h5>

                                            <p class="small">Mensaje para:
                                                @foreach ($usuarios as $usuario)
                                                    @if ($usuario->id == $publicacion->id_usuario_seguido)
                                                        {{ $usuario->name }}
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p>
                                                {{ $publicacion->contenido }}
                                            </p>

                                            @if ($publicacion->id_user == auth()->user()->id)
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <form action="{{ route('publicacion.destroy', $publicacion->id) }}"
                                                        method="POST">
                                                        {{-- <a class="btn btn-sm btn-primary "
            href="{{ route('publicacion.show', $publicacion->id) }}"><i
                class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('publicacion.edit', $publicacion->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{-- {!! $publicacion->links() !!} --}}
    </div>
    </div>
    </div>
@endsection
