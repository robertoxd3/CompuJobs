@extends('layouts.app')

@section('template_title')
    {{ $idioma->name ?? 'Show Idioma' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Idioma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('idiomas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Idioma:</strong>
                            {{ $idioma->nombre_idioma }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $idioma->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
