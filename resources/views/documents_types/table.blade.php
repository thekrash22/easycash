<table class="table table-responsive" id="documentsTypes-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documentsTypes as $documentsType)
        <tr>
            <td>{!! $documentsType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['documentsTypes.destroy', $documentsType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documentsTypes.show', [$documentsType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documentsTypes.edit', [$documentsType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>