<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tranferencias->id !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $tranferencias->valor !!}</p>
</div>

<!-- Comprobante Field -->
<div class="form-group">
    {!! Form::label('comprobante', 'Comprobante:') !!}
    <p>{!! $tranferencias->comprobante !!}</p>
</div>

<!-- Beneficiario Field -->
<div class="form-group">
    {!! Form::label('beneficiario', 'Beneficiario:') !!}
    <p>{!! $tranferencias->beneficiario !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tranferencias->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tranferencias->updated_at !!}</p>
</div>

