<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::text('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    {!! Form::text('transaction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('assignments.index') !!}" class="btn btn-default">Cancel</a>
</div>
