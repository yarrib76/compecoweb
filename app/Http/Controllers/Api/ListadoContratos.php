<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Alquileres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ListadoContratos extends Controller {

	public function listadoContratos()
	{
		$sesiones = new Sesiones();
		$control = $sesiones->validarSession(Input::get('email'), Input::get('session_id'));
		if ($control) {
			$contrato = Alquileres::where('id',Input::get('contrato_id'))->get()->load('usuario','departamento');
			return Response::json($contrato);
		}
		return "Invalid session_code ";
	}

}
