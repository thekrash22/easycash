@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assignments
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($assignments, ['route' => ['assignments.update', $assignments->id], 'method' => 'patch']) !!}

                        @include('assignments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection