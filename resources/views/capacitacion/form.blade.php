<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_capacitacion') }}
            {{ Form::text('nombre_capacitacion', $capacitacion->nombre_capacitacion, ['class' => 'form-control' . ($errors->has('nombre_capacitacion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Capacitacion']) }}
            {!! $errors->first('nombre_capacitacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $capacitacion->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
