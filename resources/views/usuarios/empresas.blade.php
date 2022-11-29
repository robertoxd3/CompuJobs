@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container">
        <h1 class="display-6 text-center">Lista de Empresas</h1>
        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
        @endif
        <div class="row">
          
            @foreach ($empresas as $user)
                <div class="col-xl-4 col-lg-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <img
                            src="{{ $user->foto }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                          />
                          <div class="ms-3">
                            <p class="fw-bold mb-1">{{ $user->name }}</p>
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                            <p class="text-muted mb-0">{{ $user->direccion }}</p>
                            <p class="text-muted mb-0">{{ $user->genero }}</p>
                          </div>
                        </div>
                        <span class="badge rounded-pill text-bg-dark">{{ $user->nombre_categoria}}</span>
                      </div>
                    </div>
                    <div
                      class="card-footer border-0 bg-light p-2 d-flex justify-content-end"
                    >
                    <form method="POST">
                        <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fas fa-user ms-2"></i
                            ></i> Ver Perfil</a>
                    </form>
                    </div>
                  </div>
                </div>
            
            @endforeach
          </div>


    </div>
@endsection
