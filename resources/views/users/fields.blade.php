<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombres:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'E-Mail:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
