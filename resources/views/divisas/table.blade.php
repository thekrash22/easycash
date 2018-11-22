<table class="table table-responsive" id="divisas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Valor</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($divisas as $divisas)
        <tr>
            <td>{!! $divisas->nombre !!}</td>
            <td>{!! $divisas->valor !!}</td>
            <td>
                {!! Form::open(['route' => ['divisas.destroy', $divisas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('divisas.show', [$divisas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('divisas.edit', [$divisas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>