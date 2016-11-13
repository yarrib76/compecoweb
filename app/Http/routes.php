<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Deàrtamentos
Route::resource('departamento', 'Departamentos\DepartamentosController');
//ContratosAlquiler
Route::resource('contratoAlquiler', 'ContratosAlquiler\ContratosAlquilerController');
Route::resource('contratoAlquilerImporte', 'ContratosAlquiler\ImporteAlquilerController');
Route::get('contratoAlquilerDisable/{id}', ['as' => 'contratoAlquilerDisable', 'uses' => 'ContratosAlquiler\ContratosAlquilerController@disable']);


Route::group(['prefix' => 'api'],
    function () {

        Route::get('/loginmovil', 'Api\ControladorLogin@loginUsuarios');
        Route::get('/crearloginmovil', 'Api\ControladorCrearLoginMovil@crearUsuario');
        Route::get('/estado_departamentos', 'Api\EstadoDeptos@listadoEstado');
        Route::get('/usuario_inquilinos', 'Api\UsuarioInquilino@listadoInquilinos');
        Route::get('/departamentos', 'Api\ApiDepartamentos@listadoDeptos');
        Route::get('/departamento_contrato', 'Api\ApiDepartamentos@listadoContrato');
        Route::get('/guardar_cobro_alquiler', 'Api\ApiSavePagoAlquiler@procesarPago');
        Route::get('/consulta_impuestos', 'Api\ConsultaImpuestos@consulta');
        Route::get('/control_pago_impuestos', 'Api\ApiSavePagoImpuestos@procesarPago');
        Route::get('/reporte_alquileres_pagos', 'Api\ReporteAlquileresPagos@reportes');
        Route::get('/reporte_impuestos_pagos', 'Api\ReporteImpuestosPagos@reportes');
        Route::get('/reporte_alquiler_anual', 'Api\ReporteAlquileresAnual@reporte');
        Route::get('/reporte_alquileres_pagos_mensual', 'Api\ReporteAlquileresPagosMensual@reporte');
    });
