<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<h2>Departamento: {{$departamento}}</h2>
<table id="reporte" class="table table-striped table-bordered records_list">
    <thead>
    <tr>
        <th>Inquilino</th>
        <th>Importe</th>
        <th>Fecha</th>
        <th>Cobrador</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$inquilino}}</td>
        <td>{{$importe}}</td>
        <td>{{$fecha}}</td>
        <td>{{$cobrador}}</td>
    </tr>
    </tbody>
</table>

<div>
    <h4>Gracias por utilizar nuestros servicios</h4>
</div>

</body>
</html>
