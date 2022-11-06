@extends('layouts.app')

@section('template_title')
    Create Publicacion
@endsection

@section('content')
    <section class="content container">

        @includeif('partials.errors')
        <h3>Nueva Publicación </h3>
        <section>
            <div class="container my-5  text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3 d-none d-sm-block"
                                        src="{{ auth()->user()->foto }}" alt="avatar" width="65" height="65" />
                                    <div class="w-100">
                                        <form method="POST" action="{{ route('publicacion.store') }}" role="form"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="id_user" class="col-md-4 col-form-label ">Usuario</label>
                                            <select name="id_user" id="id_user" class="form-control" disabled>
                                                <option value="{{ auth()->user()->id }}">
                                                    {{ auth()->user()->name }}</option>
                                            </select>
                                            <label for="id_usuario_seguido"
                                                class="col-md-4 col-form-label ">Destinatario</label>
                                            <select name="id_usuario_seguido" id="id_usuario_seguido" class="form-control">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}">
                                                        {{ $usuario->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="contenido" class="col-md-4 col-form-label ">Contenido:</label>
                                            <textarea class="form-control" id="contenido" name="contenido" rows="4" placeholder="¿Qué estas pensando?..."></textarea>
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

    </section>
@endsection
