@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Documents Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($documentsType, ['route' => ['documentsTypes.update', $documentsType->id], 'method' => 'patch']) !!}

                        @include('documents_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection