<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Departamentos;
use Illuminate\Support\Facades\Response;

class ListadoDepartamentos extends Controller {

	public function listadoDeptos()
	{
		return Response::json(Departamentos::all());	

	}

}
