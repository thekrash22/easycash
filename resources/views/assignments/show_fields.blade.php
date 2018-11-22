<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $assignments->id !!}</p>
</div>

<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users Id:') !!}
    <p>{!! $assignments->users_id !!}</p>
</div>

<!-- Transaction Id Field -->
<div class="form-group">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{!! $assignments->transaction_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $assignments->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $assignments->updated_at !!}</p>
</div>

