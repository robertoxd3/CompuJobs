@extends('layouts.app')

@section('template_title')
    {{ $oferta->name ?? 'Show Ofertum' }}
@endsection

@section('content')
    <section class="content container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-primary" href="{{ route('oferta.index') }}"> <i class="fa-solid fa-arrow-left"></i> volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h1 class="display-6 text-center">Detalle de la Oferta</h1>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <img src="/img/empresa.png" style="width: 150px ; height: 150px;" class="img-fluid" alt="...">
                                
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <strong>Titulo:</strong>
                                    {{ $oferta->titulo }}
                                </div>
                                <div class="form-group">
                                    <strong>Cargo:</strong>
                                    {{ $oferta->cargo }}
                                </div>
                                <div class="form-group">
                                    <strong>Años Experiencia:</strong>
                                    {{ $oferta->anios_experiencia }}
                                </div>
                                <div class="form-group">
                                    <strong>Rango Salarial:</strong>
                                    {{ $oferta->rango_salarial }}
                                </div>
                                <div class="form-group">
                                    <strong>Empresa:</strong>
                                    {{ $oferta->user->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Estudios:</strong>
                                    {{ $oferta->estudios }}
                                </div>
                                <hr>
                            <div class="form-group">
                                <h2 class="rfs-25 fw-bolder">Descripción de la oferta</h2>
                                {{ $oferta->descripcion}}
                            </div>
                            <a class="btn btn-primary mt-3" href="{{ route('postular', $oferta->id) }}">Postularme</a>
                            </div>
                            
                        </div>
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
