@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Agregar Departamento</i></div>
                        <div class="panel-body">
                            @include('errors.basic')

                            {!! Form::open(['class' => 'form-horizontal', 'route' => ['departamento.store'] ]) !!}
                                @include('departamentos.form')
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="submit" class="btn btn-primary" name="agregar"><i class="fa fa-btn fa-plus"></i> Agregar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
