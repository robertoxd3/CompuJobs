@extends('layouts.app')

@section('template_title')
    Ofertas
@endsection

@section('content')
    <div class="container-fluid">
        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
         @endif

        @if (auth()->user()->tipo_usuario == 'empresa')
                                <div class="float-right">
                                    <a href="{{ route('oferta.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                </div>
         @endif

         <div editable="rich" class="text-center">
            <h2 class="rfs-25 fw-bolder animate__animated animate__backInLeft">Ofertas</h2>
        </div> 

        <div class="row animate__animated animate__backInLeft" >
            @foreach ($oferta as $oferta)
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                        {{ ++$i }}
                      <div class="align-self-center">
                        <img class="rounded-circle shadow-1-strong me-3" width="65" height="65" src="{{$oferta->user->foto}}"
                        alt="avatar"  />
                      </div>
                      <div>
                        <h4>{{ $oferta->titulo }}</h4>
                        <p class="mb-0"><b>Empresa:</b> {{ $oferta->user->name }}</p>
                        <p class="mb-0"><b>Rango Salarial:</b>  ${{ $oferta->rango_salarial}}</p>
                        <p class="mb-0"><b>Cargo:</b>  {{ $oferta->cargo}}</p>
                        
                      </div>
                    </div>
                    <div class="align-self-center">
                      <a class="btn btn-sm btn-dark"
                      href="{{ route('oferta.show', $oferta->id) }}"><i class="fa-solid fa-eye"></i> Ver Más</a>
                      @if (auth()->user()->id == $oferta->id_empresa)

                                                    <form action="{{ route('oferta.destroy', $oferta->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('oferta.edit', $oferta->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                        
                     @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach 
        </div>
    </div>
@endsection
