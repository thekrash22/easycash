@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Divisas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($divisas, ['route' => ['divisas.update', $divisas->id], 'method' => 'patch']) !!}

                        @include('divisas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection