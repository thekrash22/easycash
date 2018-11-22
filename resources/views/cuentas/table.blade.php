<table class="table table-responsive" id="cuentas-table">
    <thead>
        <tr>
            <th>Nombre Beneficiaro</th>
        <th>Tipo Documento</th>
        <th># Documento</th>
        <th>Entidad Bancaria</th>
        <th>Tipo cuenta</th>
        <th># Cuenta</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cuentas as $cuentas)
        <tr>
            <td>{!! $cuentas->nombre_beneficiaro !!}</td>
            <td>{!! $cuentas->tipo_documento !!}</td>
            <td>{!! $cuentas->ndocumento !!}</td>
            <td>{!! $cuentas->entidad_bancaria !!}</td>
            <td>{!! $cuentas->tcuenta !!}</td>
            <td>{!! $cuentas->ncuenta !!}</td>
            <td>
                {!! Form::open(['route' => ['cuentas.destroy', $cuentas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cuentas.show', [$cuentas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cuentas.edit', [$cuentas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>