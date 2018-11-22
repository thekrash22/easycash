@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Countries
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($countries, ['route' => ['countries.update', $countries->id], 'method' => 'patch']) !!}

                        @include('countries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection