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

        @if (auth()->user()->tipo_usuario == 'administrador')
            <div class="container mt-4">
                <div class="row">
                    <h3>Panel de administración</h3>
                    <hr>

                    <div class="card mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 offset-md-1">
                                    <h4 class="pt-3">Usuarios registrados por categoría</h4>
                                    <hr>
                                    <canvas id="profesiones" width="100" height="100"></canvas>
                                </div>

                                <div class="col-md-4 offset-md-1">
                                    <h4 class="pt-3">Habilidades más puntuadas</h4>
                                    <hr>
                                    <canvas id="puntuadas" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const getData = async () => {
                    const response = await fetch('/infoPie', {
                        type: 'GET',
                    });

                    const data = await response.json()

                    const ctx = document.getElementById('profesiones');
                    const myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: data.categorias,
                            datasets: [{
                                label: '# de usuarios',
                                data: data.totalUsuarios,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    let habilidades = [];
                    let puntajes = [];

                    data.puntuaciones.forEach(el => {
                        habilidades.push(el.nombre_habilidad);
                        puntajes.push(el.puntaje);
                    })

                    // console.log(habilidades, puntajes)
                    const ctx2 = document.getElementById('puntuadas');
                    const myChart2 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: habilidades,
                            datasets: [{
                                label: 'Habilidades más puntuadas',
                                data: puntajes,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }

                getData();
            </script>
        @endif
    </div>
@endsection
