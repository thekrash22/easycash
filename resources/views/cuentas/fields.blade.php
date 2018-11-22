<!-- Nombre Beneficiaro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_beneficiaro', 'Nombre Beneficiaro:') !!}
    {!! Form::text('nombre_beneficiaro', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    {!! Form::select('tipo_documento', ['1' => 'Cedula Ciudadania', '2' => 'Pasaporte'], null, ['class' => 'form-control']) !!}
</div>

<!-- Ndocumento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ndocumento', 'Numero de Documento:') !!}
    {!! Form::text('ndocumento', null, ['class' => 'form-control']) !!}
</div>

<!-- Entidad Bancaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_bancaria', 'Entidad Bancaria:') !!}
    {!! Form::select('entidad_bancaria', ['1' => 'Banco Banesco Universal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tcuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tcuenta', 'Tipo de cuenta:') !!}
    {!! Form::select('tcuenta', ['1' => 'Ahorros', '2' => 'Corriente'], null, ['class' => 'form-control']) !!}
</div>

<!-- Ncuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ncuenta', 'Numero Cuenta:') !!}
    {!! Form::text('ncuenta', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cuentas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
