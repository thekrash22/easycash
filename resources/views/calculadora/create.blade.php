@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Calculadora
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="box-title">
                    <p><b>Todas nuestras operaciones tienen un costo adicional de la siguiente forma:</b></p>
                    <p>Para CUENTAS SOLES: Costo adicional de 3 Soles</p>
                    <p>Para CUENTAS DÓLARES: Costo adicional de 1 Dólar.</p>
                </div>
                <br>
                <div class="row">
                    
                    {!! Form::open(['route' => 'calculadora.calcula']) !!}

                        @include('calculadora.fields')

                    {!! Form::close() !!}
                    
                </div>
                <div class="calculado">
                    @include('flash::message')    
                </div>
                
            </div>
        </div>
    </div>
@endsection
