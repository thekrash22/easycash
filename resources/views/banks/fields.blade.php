<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre del Banco:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Countries Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries_id', 'Pais de donde es el banco:') !!}
    {!! Form::select('countries_id', $countries, old('countries_id'), array('class'=>'form-control')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('banks.index') !!}" class="btn btn-default">Cancelar</a>
</div>
