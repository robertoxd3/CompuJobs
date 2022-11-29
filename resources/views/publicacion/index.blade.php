@extends('layouts.app')

@section('template_title')
    Publicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
        <section>
            <div class="text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3 d-none d-sm-block"
                                        src="{{ auth()->user()->foto }}" alt="avatar" width="65" height="65" />
                                        <div class="w-100">
                                        <form method="POST" action="{{ route('publicacion.store') }}" role="form"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="id_user" class="col-md-4 col-form-label ">Usuario</label>
                                                    <select name="id_user" id="id_user" class="form-control" disabled>
                                                        <option value="{{ auth()->user()->id }}">
                                                            {{ auth()->user()->name }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id_usuario_seguido"
                                                    class="col-md-4 col-form-label ">Destinatario</label>
                                                <select name="id_usuario_seguido" id="id_usuario_seguido" class="form-control">
                                                    @foreach ($usuarios as $usuario)
                                                        <option value="{{ $usuario->id }}">
                                                            {{ $usuario->name }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="contenido" class="col-md-4 col-form-label ">Contenido:</label>
                                                    <textarea class="form-control" id="contenido" name="contenido" rows="2" placeholder="¿Qué estas pensando?..."></textarea>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary">
                                                    Publicar <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div editable="rich" class="mt-3">
            <h2 class="rfs-25 fw-bolder">Últimas publicaciones</h2>
        </div> 

                <div class="small d-flex justify-content-end d-none">
                    <a href="{{ route('publicacion.create') }}" class="btn btn-primary btn-md float-right"
                        data-placement="left">
                        {{ __('Crear publicación') }}
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
                <div class="container-fluid my-2 w-100">
                    <div class="row w-100">
                        <div class="col-md-12 col-lg-9 col-xl-7 w-100">
                            <div class="d-flex flex-start mb-4">
                               
                                <div class="card w-100">
                                    
                                    <div class="card-body p-2">
                                        <div class="row">
                                            <div class="col-3 col-md-1">
                                                <img class="rounded-circle shadow-1-strong me-3 img-fluid" src="{{$publicacion->user->foto}}"
                                                alt="avatar"  />
                                            </div>
                                            <div class="col-9 col-md-11">
                                                <div class="small d-flex justify-content-end">
                                                    {{ $publicacion->created_at->diffForHumans() }}</div>
                                                <div class="">
                                                    <h5>
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
                    </div>
                </div>
            </section>
        @endforeach

        {{-- {!! $publicacion->links() !!} --}}
    </div>
    </div>
    </div>
@endsection
