<table class="table table-responsive" id="banks-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Pais</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($banks as $banks)
        <tr>
            <td>{!! $banks->name !!}</td>
            <td>{!! $banks->countries->name !!}</td>
            <td>
                {!! Form::open(['route' => ['banks.destroy', $banks->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('banks.show', [$banks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('banks.edit', [$banks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>