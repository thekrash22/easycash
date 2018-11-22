<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Comprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comprobante', 'Comprobante:') !!}
    {!! Form::file('comprobante', ['class' => 'form-control']) !!}
</div>

<!-- Beneficiario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiario', 'Beneficiario:') !!}
    {!! Form::select('beneficiario', $cuentas, old('beneficiario'), array('class'=>'form-control')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tranferencias.index') !!}" class="btn btn-default">Cancelar</a>
</div>
