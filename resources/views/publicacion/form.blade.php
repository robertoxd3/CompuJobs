<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('contenido') }}
            {{ Form::textarea('contenido', $publicacion->contenido, ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => '¿Qué estas pensando?...', 'rows' => '3']) }}
            {!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user', 'Usuario') }}
            {{ Form::text('id_user', $publicacion->user->name, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'disabled' => true]) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario_seguido', 'Usuario seguido') }}
            {{ Form::text('id_usuario_seguido', $publicacion->userSeguido->name, ['class' => 'form-control' . ($errors->has('id_usuario_seguido') ? ' is-invalid' : ''), 'placeholder' => 'Usuario seguido', 'disabled' => true]) }}
            {!! $errors->first('id_usuario_seguido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">
            Publicar <i class="fas fa-long-arrow-alt-right ms-1"></i>
        </button>
    </div>
</div>
