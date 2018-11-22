<table class="table table-responsive" id="transactions-table">
    <thead>
        <tr>
            <th>Beneficiario</th>
            <th>Estado</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{!! $transaction->acounts->beneficiary_name !!}</td>
            <td>{!! $transaction->statuses->name !!}</td>
            <td>{!! $transaction->amount !!}</td>
            <td>
                
                <div class='btn-group'>
                    <a href="{!! route('transactions.show', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>