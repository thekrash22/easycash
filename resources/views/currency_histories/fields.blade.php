<!-- Foreing Exchange Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foreing_exchange_id', 'Divisa:') !!}
    {!! Form::select('foreing_exchange_id', $foreingexchange, old('foreing_exchange_id'), array('class'=>'form-control')) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Precio Hoy:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('currencyHistories.index') !!}" class="btn btn-default">Cancelar</a>
</div>
