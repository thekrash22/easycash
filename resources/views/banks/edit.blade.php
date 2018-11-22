@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Banks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($banks, ['route' => ['banks.update', $banks->id], 'method' => 'patch']) !!}

                        @include('banks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection