<div class="form-group">
    <div class="form-group">
        {!! Form::label('fecha', 'Fecha: ', ['class' => 'col-sm-3 control-label']) !!}
        <input type="date" name="fecha" max="2040-12-31"><br><br>

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

