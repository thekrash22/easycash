<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transaction->id !!}</p>
</div>

<!-- Acounts Id Field -->
<div class="form-group">
    {!! Form::label('acounts_id', 'Acounts Id:') !!}
    <p>{!! $transaction->acounts_id !!}</p>
</div>

<!-- Currency Histories Id Field -->
<div class="form-group">
    {!! Form::label('currency_histories_id', 'Currency Histories Id:') !!}
    <p>{!! $transaction->currency_histories_id !!}</p>
</div>

<!-- Statuses Id Field -->
<div class="form-group">
    {!! Form::label('statuses_id', 'Statuses Id:') !!}
    <p>{!! $transaction->statuses_id !!}</p>
</div>

<!-- Customervoucher Field -->
<div class="form-group">
    {!! Form::label('customervoucher', 'Customervoucher:') !!}
    <div class="col-md-12">
        <img class="img-responsive" src="{{asset('storage/'.$transaction->customervoucher)}}"></img>
    </div>
</div>

<!-- Systemvoucher Field -->
<div class="form-group">
    {!! Form::label('systemvoucher', 'Systemvoucher:') !!}
    <p>{!! $transaction->systemvoucher !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $transaction->amount !!}</p>
</div>

<!-- Net Field -->
<div class="form-group">
    {!! Form::label('net', 'Net:') !!}
    <p>{!! $transaction->net !!}</p>
</div>

<!-- Utility Field -->
<div class="form-group">
    {!! Form::label('utility', 'Utility:') !!}
    <p>{!! $transaction->utility !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaction->updated_at !!}</p>
</div>

