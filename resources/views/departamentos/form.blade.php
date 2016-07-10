<div class="form-group">

    {!! Form::label('nombre', 'Direccion :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('direccion', 'direccion', null, ['id' => 'direccion', 'class' => 'form-control patente', 'name' => 'direccion', 'placeholder' => 'Direccion'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('depto_estado', 'Estado:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        @if (isset($estado_id))
            {!! Form::select('estado', $estados, $estado_id, ['id' => 'estado', 'class' => 'form-control', 'name' => 'estado_id']) !!}
        @else
            {!! Form::select('estado', $estados, null, ['id' => 'estado', 'class' => 'form-control', 'name' => 'estado_id']) !!}
        @endif
    </div>
</div>
