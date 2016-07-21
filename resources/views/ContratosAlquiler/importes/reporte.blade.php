@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Importes para departamento: {{$direccion}}</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Importe</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($importesAlquiler as $importeAlquiler)
                                    <tr>
                                        <td>{{$importeAlquiler->fecha}}</td>
                                        <td>{{$importeAlquiler->importe_alquiler}}</td>
                                        <td>
                                          <!--  {!! HTML::linkRoute('contratoAlquilerImporte.edit', ' Editar', $importeAlquiler->id , ['class' => 'btn btn-primary'] ) !!} -->
                                                {!! HTML::linkRoute('contratoAlquilerImporte.destroy', ' Borrar', ['importe_id' => $importeAlquiler->id, 'contrato_id' => $contrato_id] , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar el Contrato ' . $importeAlquiler->importe_alquiler . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! HTML::linkRoute('contratoAlquilerImporte.create', 'Agregar Importe', ['contrato_id' => $contrato_id] , ['class' => 'btn btn-primary'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('extra-javascript')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/font-awesome/dataTables.fontAwesome.css">

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <!-- DataTables -->

    <script type="text/javascript">

        $(document).ready( function () {
            $('#reporte').DataTable({

                        "lengthMenu": [ [8,  16, 32, -1], [8, 16, 32, "Todos"] ],
                        language: {
                            search: "Buscar:",
                            "thousands": ",",
                            processing:     "Traitement en cours...",
                            lengthMenu:    "Mostrar _MENU_ importes",
                            info:           "Mostrando del  _START_ al _END_ de _TOTAL_ importes",
                            infoEmpty:      "0 moviles",
                            infoFiltered:   "(Filtrando _MAX_ importes en total)",
                            infoPostFix:    "",
                            loadingRecords: "Chargement en cours...",
                            zeroRecords:    "No se encontraron importes para esa busqueda",
                            emptyTable:     "No existen importes",
                            paginate: {
                                first:      "Primero",
                                previous:   "Anterior",
                                next:       "Proximo",
                                last:       "Ultimo"
                            }
                        }
                    }

            );
        } );
    </script>
@stop