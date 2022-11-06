<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $oferta->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargo') }}
            {{ Form::text('cargo', $oferta->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('anios_experiencia') }}
            {{ Form::number('anios_experiencia', $oferta->anios_experiencia, ['class' => 'form-control' . ($errors->has('anios_experiencia') ? ' is-invalid' : ''), 'placeholder' => 'Anios Experiencia']) }}
            {!! $errors->first('anios_experiencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rango salarial') }}
            {{ Form::number('rango salarial', $oferta->rango_salarial, ['class' => 'form-control' . ($errors->has('rango_salarial') ? ' is-invalid' : ''), 'placeholder' => 'Rango Salarial']) }}
            {!! $errors->first('rango salarial', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
