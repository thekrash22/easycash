@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Currency History
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($currencyHistory, ['route' => ['currencyHistories.update', $currencyHistory->id], 'method' => 'patch']) !!}

                        @include('currency_histories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection