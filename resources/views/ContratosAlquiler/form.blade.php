<div class="form-group">
    <div class="form-group">
        {!! Form::label('inquilino', 'Departamento:', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-6">
            @if (isset($depto_id))
                {!! Form::select('departamento', $departamentos, $depto_id, ['id' => 'inquilino', 'class' => 'form-control', 'name' => 'departamento_id']) !!}
            @else
                {!! Form::select('departamento', $departamentos, null, ['id' => 'inquilino', 'class' => 'form-control', 'name' => 'departamento_id']) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('inquilino', 'Inquilino:', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-6">
            @if (isset($inquilino_id))
                {!! Form::select('inquilino', $inquilinos, $inquilino_id, ['id' => 'inquilino', 'class' => 'form-control', 'name' => 'inquilino_id']) !!}
            @else
                {!! Form::select('inquilino', $inquilinos, null, ['id' => 'inquilino', 'class' => 'form-control', 'name' => 'inquilino_id']) !!}
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('fecha_inicio', 'Fecha Inicio:', ['class' => 'col-sm-3 control-label']) !!}
        <input type="date" name="fecha_inicio" max="2040-12-31"><br><br>

    </div>
    <div class="form-group">
        {!! Form::label('fecha_fin', 'Fecha Fin:', ['class' => 'col-sm-3 control-label']) !!}
        <input type="date" name="fecha_fin" max="2040-12-31"><br><br>

    </div>
    <div class="form-group">

        {!! Form::label('precio', 'Valor Alquiler:', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-6">

            @if (isset($precio))
                {!! Form::input('number', 'precio', $costo, ['id' => 'precio', 'class' => 'form-control', 'name' => 'costo','placeholder' => 'Precio Mensual'])  !!}
            @else
                {!! Form::input('number', 'precio', null, ['id' => 'precio', 'class' => 'form-control', 'name' => 'costo','placeholder' => 'Precio Mensual'])  !!}
            @endif
        </div>
    </div>
</div>

