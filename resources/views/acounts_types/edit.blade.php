@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acounts Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($acountsType, ['route' => ['acountsTypes.update', $acountsType->id], 'method' => 'patch']) !!}

                        @include('acounts_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection