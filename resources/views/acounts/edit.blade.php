@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acounts
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($acounts, ['route' => ['acounts.update', $acounts->id], 'method' => 'patch']) !!}

                        @include('acounts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection