<table class="table table-responsive" id="acounts-table">
    <thead>
        <tr>
            <th>Nombre Beneficiario</th>
            <th>Banco</th>
            <th># Cuenta</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($acounts as $acounts)
        <tr>
            <td>{!! $acounts->beneficiary_name !!}</td>
            <td>{!! $acounts->banks->name !!}</td>
            <td>{!! $acounts->acountnumber !!}</td>
            <td>
                {!! Form::open(['route' => ['acounts.destroy', $acounts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('acounts.show', [$acounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('acounts.edit', [$acounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>