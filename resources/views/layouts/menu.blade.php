@permission('listar-paises')
<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa  fa-globe"></i><span>Paises</span></a>
</li>
@endpermission
@permission('listar-divisas')
<li class="{{ Request::is('foreingExchanges*') ? 'active' : '' }}">
    <a href="{!! route('foreingExchanges.index') !!}"><i class="fa fa-money"></i><span>Divisas(nombres)</span></a>
</li>
@endpermission
@permission('listar-bancos')
<li class="{{ Request::is('banks*') ? 'active' : '' }}">
    <a href="{!! route('banks.index') !!}"><i class="fa fa-bank"></i><span>Bancos</span></a>
</li>
@endpermission

<li class="{{ Request::is('documentsTypes*') ? 'active' : '' }}">
    <a href="{!! route('documentsTypes.index') !!}"><i class="fa  fa-id-card-o"></i><span>Tipos de Documentos</span></a>
</li>


<li class="{{ Request::is('acountsTypes*') ? 'active' : '' }}">
    <a href="{!! route('acountsTypes.index') !!}"><i class="fa fa-credit-card-alt"></i><span>Tipos de Cuentas</span></a>
</li>


<li class="{{ Request::is('acounts*') ? 'active' : '' }}">
    <a href="{!! route('acounts.index') !!}"><i class="fa fa-credit-card-alt"></i><span>Cuentas</span></a>
</li>


<li class="{{ Request::is('currencyHistories*') ? 'active' : '' }}">
    <a href="{!! route('currencyHistories.index') !!}"><i class="fa fa-usd"></i><span>Precios Divisas</span></a>
</li>

@permission('crear-estado')
<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{!! route('statuses.index') !!}"><i class="fa fa-folder"></i><span>Estados de transacciones</span></a>
</li>
@endpermission

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{!! route('transactions.index') !!}"><i class="fa fa-cogs"></i><span>Transacciones</span></a>
</li>

<li class="">
    <a href="calculadora"><i class="fa fa-cogs"></i><span>Calculadora</span></a>
</li>


<li class="{{ Request::is('assignments*') ? 'active' : '' }}">
    <a href="{!! route('assignments.index') !!}"><i class="fa fa-edit"></i><span>Assignments</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

