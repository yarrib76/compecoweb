<div class="form-group">

    <div class="form-group">

        {!! Form::label('departamento', 'Departamento:', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-6">
            @if (isset($estado_id))
                {!! Form::select('departamento', $estados, $estado_id, ['id' => 'departamento', 'class' => 'form-control', 'name' => 'departamento_id']) !!}
            @else
                {!! Form::select('departamento', $estados, null, ['id' => 'departamento', 'class' => 'form-control', 'name' => 'departamento_id']) !!}
            @endif
        </div>
    </div>

    {!! Form::label('nombre', 'Direccion :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        @if (!isset($departamento))
            {!! Form::input('direccion', 'direccion', null, ['id' => 'direccion', 'class' => 'form-control patente', 'name' => 'direccion', 'placeholder' => 'Direccion'])  !!}
        @else
            {!! Form::input('direccion', 'direccion', $departamento->direccion, ['id' => 'direccion', 'class' => 'form-control patente', 'name' => 'direccion', 'placeholder' => 'Direccion'])  !!}
        @endif
    </div>
</div>

