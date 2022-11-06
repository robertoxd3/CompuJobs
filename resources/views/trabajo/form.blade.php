<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_trabajo') }}
            {{ Form::text('nombre_trabajo', $trabajo->nombre_trabajo, ['class' => 'form-control' . ($errors->has('nombre_trabajo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Trabajo']) }}
            {!! $errors->first('nombre_trabajo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $trabajo->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20 mt-1">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
