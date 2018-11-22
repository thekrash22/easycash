<table class="table table-responsive" id="currencyHistories-table">
    <thead>
        <tr>
            <th>Divisa</th>
            <th>Precio</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($currencyHistories as $currencyHistory)
        <tr>
            <td>{!! $currencyHistory->foreingexchange->name !!}</td>
            <td>{!! $currencyHistory->price !!}</td>
            <td>
                {!! Form::open(['route' => ['currencyHistories.destroy', $currencyHistory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('currencyHistories.show', [$currencyHistory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('currencyHistories.edit', [$currencyHistory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>