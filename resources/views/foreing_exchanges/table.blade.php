<table class="table table-responsive" id="foreingExchanges-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($foreingExchanges as $foreingExchange)
        <tr>
            <td>{!! $foreingExchange->name !!}</td>
            <td>
                {!! Form::open(['route' => ['foreingExchanges.destroy', $foreingExchange->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('foreingExchanges.show', [$foreingExchange->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('foreingExchanges.edit', [$foreingExchange->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>