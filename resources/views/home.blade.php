@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Página de inicio</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <img class="mx-auto" style="max-width: 200px" src="{{ auth()->user()->foto }}"
                                    alt="">
                                <h1>Bienvenido al sistema de vacantes profesionales</h1>
                                    
                            </div>
                        </div>
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
