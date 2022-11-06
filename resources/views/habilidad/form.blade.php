<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_habilidad') }}
            {{ Form::text('nombre_habilidad', $habilidad->nombre_habilidad, ['class' => 'form-control' . ($errors->has('nombre_habilidad') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Habilidad']) }}
            {!! $errors->first('nombre_habilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $habilidad->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('puntaje') }}
            {{ Form::text('puntaje', $habilidad->puntaje, ['class' => 'form-control' . ($errors->has('puntaje') ? ' is-invalid' : ''), 'placeholder' => 'Puntaje']) }}
            {!! $errors->first('puntaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $habilidad->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
