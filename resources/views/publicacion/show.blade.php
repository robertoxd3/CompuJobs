@extends('layouts.app')

@section('template_title')
    {{ $publicacion->name ?? 'Show Publicacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Publicacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('publicacion.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Contenido:</strong>
                            {{ $publicacion->contenido }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $publicacion->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario Seguido:</strong>
                            {{ $publicacion->id_usuario_seguido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
