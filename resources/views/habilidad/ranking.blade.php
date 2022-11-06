@extends('layouts.app')

@section('template_title')
    Habilidad
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center display-6">Ranking de habilidades</h1>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                       
                        <ul class="list-group list-group-dark">
                            @foreach ($habilidads as $habilidad)
                           
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <span class="fs-5">#<b>{{$i++}}</b></span>
                                <img src="/img/ranking.png" alt="" style="width: 45px; height: 45px"
                                  class="rounded-circle ms-3" />
                                <div class="ms-3">
                                  <p class="fw-bold mb-1">{{ $habilidad->nombre_habilidad }}</p>
                                  <p class="text-muted mb-0">{{ $habilidad->descripcion }}</p>
                                  <form method="POST">
                                    <a data-mdb-toggle="tooltip" style="font-size: 15px; color: #34495E " title="Ver Usuario"  href="{{ route('usuarios.show',$habilidad->id_user) }}"> <i class="fa-solid fa-eye"></i></a>
                                </form>
                                </div>
                              </div>
                              <span class="badge rounded-pill badge-dark">Puntaje: {{ $habilidad->puntaje }}</span>
                            </li>
                            @endforeach
                          </ul>
                    </div>
                </div>
              
            </div>
        </div>
        
        
       

    </div>
@endsection
