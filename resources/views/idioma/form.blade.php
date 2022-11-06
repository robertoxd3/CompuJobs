<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_idioma') }}
            {{ Form::text('nombre_idioma', $idioma->nombre_idioma, ['class' => 'form-control' . ($errors->has('nombre_idioma') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Idioma']) }}
            {!! $errors->first('nombre_idioma', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $idioma->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
