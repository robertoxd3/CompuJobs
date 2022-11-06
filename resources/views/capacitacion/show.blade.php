@extends('layouts.app')

@section('template_title')
    {{ $capacitacion->name ?? 'Show Capacitacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Capacitacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('capacitaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre Capacitacion:</strong>
                            {{ $capacitacion->nombre_capacitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $capacitacion->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
