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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Deàrtamentos
Route::resource('departamento', 'Departamentos\DepartamentosController');

Route::group(['prefix' => 'api'],
    function () {

        Route::get('/loginmovil', 'Api\ControladorLogin@loginUsuarios');
        Route::get('/crearloginmovil', 'Api\ControladorCrearLoginMovil@crearUsuario');
        Route::get('/estado_departamentos', 'Api\EstadoDeptos@listadoEstado');
    });
