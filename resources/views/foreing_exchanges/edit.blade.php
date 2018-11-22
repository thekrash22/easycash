@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Foreing Exchange
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($foreingExchange, ['route' => ['foreingExchanges.update', $foreingExchange->id], 'method' => 'patch']) !!}

                        @include('foreing_exchanges.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection