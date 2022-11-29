@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="overflow-hidden">
            <div class="container-fluid col-xxl-8">
                <div class="row flex-lg-nowrap align-items-center g-5">
                    <div class="order-lg-1 w-100">
                        <img style="clip-path: polygon(25% 0%, 100% 0%, 100% 99%, 0% 100%);" src="https://images.unsplash.com/photo-1618004912476-29818d81ae2e?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768" class="d-block mx-lg-auto img-fluid" alt="Photo by Milad Fakurian" loading="lazy" srcset="https://images.unsplash.com/photo-1618004912476-29818d81ae2e?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768 1080w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="2160" height="768">
                    </div>
                    <div class="col-lg-6 col-xl-5 text-center text-lg-start pt-lg-5 mt-xl-4">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h1 class="fw-bold display-3 animate__animated animate__fadeInLeft">Bienvenido CompuJobs</h1>
                            </div>
                        </div>
        
                        <div class="lc-block mb-5 animate__animated animate__fadeInLeft">
                            <div editable="rich">
                                <p class="lead">¡No se olvide de ver las nuevas ofertas posteadas por las empresas suscritas! </p>
                            </div>
                        </div>
        
                        <div class="lc-block mb-6"><a class="btn btn-primary px-4 me-md-2 btn-lg animate__animated animate__fadeInRight" href="{{ url('oferta') }}" role="button">Ver ahora</a>
                        </div>
                    </div>
        
                </div><!-- /lc-block -->
            </div>
        </div>
        

        @if (auth()->user()->tipo_usuario == 'administrador')
            <div class="container mt-4">
                <div class="row">
                    <div editable="rich" class="text-center">
                        <h2 class="rfs-25 fw-bolder">Panel de administración</h2>
                    </div>
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
                                    'rgba(220, 118, 51)',
                                    'rgba(52, 73, 94)',
                                    'rgba(127, 140, 141)',
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
                                    'rgba(52, 73, 94)',
                                    'rgba(127, 140, 141)',
                                    'rgba(220, 118, 51)',
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

        @if (auth()->user()->tipo_usuario == 'administrador')   
        <div editable="rich" class="text-center">
            <h2 class="rfs-25 fw-bolder animate__animated animate__backInLeft">Reportes Administrador</h2>
        </div>   
        <div class="row text-center text-lg-start animate__animated animate__backInLeft">
            <div class="col-lg-3 col-md-4 col-6"  id="reporteAdmin">
                <a  target="_blank" href="/reporteUsuario" class="d-block mb-4 h-100">
                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: #2C3E50;"  id="cardCustom" >
                        <div class="card-header text-center">Reporte de usuarios</div>
                        <div class="card-body text-center">
                            <span class="card-text"> <i class="fa-solid fa-file-pdf fa-3x"></i></span><br>
                            <p class=" badge badge-info card-text text-black">Reporte 1</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-6">
                <a  target="_blank" href="/reporteHabilidad" class="d-block mb-4 h-100">
                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: #1F618D;">
                        <div class="card-header text-center">Reporte de habilidades</div>
                        <div class="card-body text-center">
                            <span class="card-text"><i class="fa-solid fa-file-pdf fa-3x"></i></span><br>
                            <p class=" badge badge-info card-text text-black">Reporte 2</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a  target="_blank" href="/reporteProfesion" class="d-block mb-4 h-100">
                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: #515A5A;">
                        <div class="card-header text-center">Reporte de profesiones</div>
                        <div class="card-body text-center">
                            <span class="card-text"><i class="fa-solid fa-file-pdf fa-3x"></i></span><br>
                            <p class=" badge badge-info card-text text-black">Reporte 3</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>   
    @endif

    </div>
@endsection
