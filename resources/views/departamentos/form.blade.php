<div class="form-group">

    {!! Form::label('nombre', 'Nombre :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('nombre', 'nombre', null, ['id' => 'nombre', 'class' => 'form-control patente', 'name' => 'nombre', 'placeholder' => 'Nombre de la Actividad'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('club', 'Club :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('club', 'club', null, ['id' => 'club', 'class' => 'form-control nombre', 'name' => 'club', 'placeholder' => 'Nombre del club'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('detalle', 'Detalle :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('detalle', 'detalle', null, ['id' => 'descripcion', 'class' => 'form-control', 'name' => 'descripcion'])  !!}
    </div>
</div>
