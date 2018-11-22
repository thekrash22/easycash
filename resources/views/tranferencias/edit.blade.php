@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tranferencias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tranferencias, ['route' => ['tranferencias.update', $tranferencias->id], 'method' => 'patch']) !!}

                        @include('tranferencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection