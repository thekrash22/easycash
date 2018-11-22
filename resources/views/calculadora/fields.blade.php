<div class="form-group col-sm-6">
  {!! Form::label('moneda', 'Seleccione moneda a convertir:') !!}
  {!! Form::select('moneda', $monedas, old('moneda'), array('class'=>'form-control')) !!}
</div>
<!-- Beneficiary Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor a calcular:') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Documents Type Id Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Calcular', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acounts.index') !!}" class="btn btn-default">Cancelar</a>
</div>
