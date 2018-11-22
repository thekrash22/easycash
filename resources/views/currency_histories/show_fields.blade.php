<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $currencyHistory->id !!}</p>
</div>

<!-- Foreing Exchange Id Field -->
<div class="form-group">
    {!! Form::label('foreing_exchange_id', 'Foreing Exchange Id:') !!}
    <p>{!! $currencyHistory->foreing_exchange_id !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $currencyHistory->price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $currencyHistory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $currencyHistory->updated_at !!}</p>
</div>

