<table class="table table-responsive" id="assignments-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Monto</th>
            <th>
                Banco
            </th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($disponibles as $disponible)
        <tr>
            <td>{!! $disponible->id !!}</td>
            <td>{!! $disponible->amount !!}</td>
            <td>{!! $disponible->acounts->banks->name!!}</td>
            <td>
            {!! Form::open(['route' => ['atender.atender'], 'method' => 'post']) !!}
                <div class='btn-group'>
                    {{ Form::text('id',$disponible->id,['hidden' => 'hidden']) }}
                    {!! Form::button('<i class="glyphicon glyphicon-circle-arrow-down"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>