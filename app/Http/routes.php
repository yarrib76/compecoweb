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
    });
