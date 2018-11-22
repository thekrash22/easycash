<!-- Beneficiary Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiary_name', 'Nombre del beneficiario:') !!}
    {!! Form::text('beneficiary_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Documents Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documents_types_id', 'Tipo de documento:') !!}
    {!! Form::select('documents_types_id', $documentstype, old('documents_types_id'), array('class'=>'form-control')) !!}
</div>

<!-- Documentnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documentnumber', '# de Documento:') !!}
    {!! Form::text('documentnumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Banks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banks_id', 'Banco del Beneficiario:') !!}
    {!! Form::select('banks_id', $banks, old('banks_id'), array('class'=>'form-control')) !!}
</div>

<!-- Acounts Types Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acounts_types_id', 'Tipo de cuenta del beneficiario:') !!}
    {!! Form::select('acounts_types_id', $acountstype, old('acounts_types_id'), array('class'=>'form-control')) !!}
</div>

<!-- Acountnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acountnumber', '# de Cuenta:') !!}
    {!! Form::text('acountnumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::text('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acounts.index') !!}" class="btn btn-default">Cancelar</a>
</div>
