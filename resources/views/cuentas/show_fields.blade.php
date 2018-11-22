<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', '#:') !!}
    <p>{!! $cuentas->id !!}</p>
</div>

<!-- Nombre Beneficiaro Field -->
<div class="form-group">
    {!! Form::label('nombre_beneficiaro', 'Nombre de Beneficiaro:') !!}
    <p>{!! $cuentas->nombre_beneficiaro !!}</p>
</div>

<!-- Tipo Documento Field -->
<div class="form-group">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    <p>{!! $cuentas->tipo_documento !!}</p>
</div>

<!-- Ndocumento Field -->
<div class="form-group">
    {!! Form::label('ndocumento', '# documento:') !!}
    <p>{!! $cuentas->ndocumento !!}</p>
</div>

<!-- Entidad Bancaria Field -->
<div class="form-group">
    {!! Form::label('entidad_bancaria', 'Entidad Bancaria:') !!}
    <p>{!! $cuentas->entidad_bancaria !!}</p>
</div>

<!-- Tcuenta Field -->
<div class="form-group">
    {!! Form::label('tcuenta', 'Tipo cuenta:') !!}
    <p>{!! $cuentas->tcuenta !!}</p>
</div>

<!-- Ncuenta Field -->
<div class="form-group">
    {!! Form::label('ncuenta', '# cuenta:') !!}
    <p>{!! $cuentas->ncuenta !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cuentas->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cuentas->updated_at !!}</p>
</div>

