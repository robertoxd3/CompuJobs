@extends('layouts.app')

@section('template_title')
    {{ $trabajo->name ?? 'Show Trabajo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Trabajo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('trabajos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Trabajo:</strong>
                            {{ $trabajo->nombre_trabajo }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $trabajo->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
