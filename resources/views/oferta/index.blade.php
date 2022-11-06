@extends('layouts.app')

@section('template_title')
    Ofertas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ofertas') }}
                            </span>

                            @if (auth()->user()->tipo_usuario == 'empresa')
                                <div class="float-right">
                                    <a href="{{ route('oferta.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Titulo</th>
                                        <th>Cargo</th>
                                        <th>Anios Experiencia</th>
                                        <th>Rango Salarial</th>
                                        <th>Empresa</th>
                                        @if (auth()->user()->tipo_usuario == 'empresa')
                                            <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($oferta as $oferta)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $oferta->titulo }}</td>
                                            <td>{{ $oferta->cargo }}</td>
                                            <td>{{ $oferta->anios_experiencia }}</td>
                                            <td>{{ $oferta->rango_salarial }}</td>
                                            <td>{{ $oferta->user->name }}</td>

                                            @if (auth()->user()->id == $oferta->id_empresa)
                                                <td>
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
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $oferta->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
