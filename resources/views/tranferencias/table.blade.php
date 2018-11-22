<table class="table table-responsive" id="tranferencias-table">
    <thead>
        <tr>
            <th>Valor</th>
        <th>Comprobante</th>
        <th>Beneficiario</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tranferencias as $tranferencias)
        <tr>
            <td>{!! $tranferencias->valor !!}</td>
            <td>{!! $tranferencias->comprobante !!}</td>
            <td>{!! $tranferencias->beneficiario !!}</td>
            <td>
                {!! Form::open(['route' => ['tranferencias.destroy', $tranferencias->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tranferencias.show', [$tranferencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tranferencias.edit', [$tranferencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>