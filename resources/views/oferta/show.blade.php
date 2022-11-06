@extends('layouts.app')

@section('template_title')
    {{ $oferta->name ?? 'Show Ofertum' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ofertum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('oferta.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $oferta->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $oferta->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Anios Experiencia:</strong>
                            {{ $oferta->anios_experiencia }}
                        </div>
                        <div class="form-group">
                            <strong>Rango Salarial:</strong>
                            {{ $oferta->rango salarial }}
                        </div>
                        <div class="form-group">
                            <strong>Id Empresa:</strong>
                            {{ $oferta->id_empresa }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
