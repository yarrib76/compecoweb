@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Lista de Contratos</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <thead>
                                    <tr>
                                        <th>Departamento</th>
                                        <th>Inquilino</th>
                                        <th>Fecha Ingreso</th>
                                        <th>Fecha Fin Contrato</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contratosAlquileres as $contratoAlquiler)
                                    <tr>
                                        <td>{{$contratoAlquiler->departamento->direccion}}</td>
                                        <td>{{$contratoAlquiler->usuario->name}}</td>
                                        <td>{{$contratoAlquiler->fecha_inicio}}</td>
                                        <td>{{$contratoAlquiler->fecha_vencimiento}}</td>
                                        <td>
                                          <!--  {!! HTML::linkRoute('contratoAlquiler.edit', ' Editar', $contratoAlquiler->id , ['class' => 'btn btn-primary'] ) !!} -->
                                            {!! HTML::linkRoute('contratoAlquiler.destroy', ' Borrar', $contratoAlquiler->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar el Contrato ' . $contratoAlquiler->departamento->direccion . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! HTML::linkRoute('contratoAlquiler.create', ' Nuevo Contrato', null , ['class' => 'btn btn-primary'] ) !!}
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
                            lengthMenu:    "Mostrar _MENU_ contratos",
                            info:           "Mostrando del  _START_ al _END_ de _TOTAL_ contratos",
                            infoEmpty:      "0 moviles",
                            infoFiltered:   "(Filtrando _MAX_ contratos en total)",
                            infoPostFix:    "",
                            loadingRecords: "Chargement en cours...",
                            zeroRecords:    "No se encontraron contratos para esa busqueda",
                            emptyTable:     "No existen contratos",
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