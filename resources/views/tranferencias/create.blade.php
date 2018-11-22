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
                    {!! Form::open(['route' => 'tranferencias.store']) !!}

                        @include('tranferencias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
