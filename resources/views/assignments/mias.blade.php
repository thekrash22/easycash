<table class="table table-responsive" id="assignments-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Monto</th>
            <th>Banco</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mias as $mia)
        <tr>
            <td>{!! $mia->id !!}</td>
            <td>{!! $mia->amount !!}</td>
            <td>{!! $mia->acounts->banks->name !!}</td>
            <td><a href="#" class="btn btn-primary">Gestionar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>