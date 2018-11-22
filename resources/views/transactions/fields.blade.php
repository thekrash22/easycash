<!-- Amount Field -->
<div class="form-group col-sm-6">
  {!! Form::label('moneda', 'Seleccione tipo de moneda consignado:') !!}
  {!! Form::select('moneda', $monedas, old('moneda'), array('class'=>'form-control')) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Valor a depositar:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Acounts Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acounts_id', 'Cuenta Beneficiario:') !!}
    <select id="acounts_id" name="acounts_id" class="form-control">
      <option selected="selected" value="null">Por favor seleccione uno</option>
      @foreach ($cuentas as $cuenta)
        <option value="{{$cuenta['id']}}">{{$cuenta['name']}}</option>
      @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <a type="button" class="btn btn-default" href="{{url('/acounts/create')}}">
      Crear Nueva Cuenta
    </a>
</div>

<!-- Customervoucher Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customervoucher', 'Customervoucher:') !!}
    {!! Form::file('customervoucher',null, ['class' => 'form-control']) !!}
    <p class="help-block">Example block-level help text here.</p>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Cancelar</a>
</div>
