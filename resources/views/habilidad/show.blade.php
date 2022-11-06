@extends('layouts.app')

@section('template_title')
    {{ $habilidad->name ?? 'Show Habilidad' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Habilidad</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('habilidades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Habilidad:</strong>
                            {{ $habilidad->nombre_habilidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $habilidad->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Puntaje:</strong>
                            {{ $habilidad->puntaje }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $habilidad->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
