<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\Alquileres;
use AlquilerAdmin\Models\Departamentos;
use AlquilerAdmin\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
class ApiDepartamentos extends Controller {

	public function listadoDeptos()
	{
        $sesiones = new Sesiones();
        $control = $sesiones->validarSession(Input::get('email'),Input::get('session_id'));
        if ($control){
            //$departamentos = $this->formateoDatos(Departamentos::all());
            return Response::json(Departamentos::all()->load('estado'));
        }
        return "Invalid session_code ";

	}

    public function listadoContrato()
    {
        $sesiones = new Sesiones();
        $control = $sesiones->validarSession(Input::get('email'), Input::get('session_id'));
        if ($control) {
            $contrato = Alquileres::where('depto_id',Input::get('depto_id'))->where('estado_alquiler','1')->get()->load('usuario','departamento');
           // $contrato = Alquileres::where('depto_id',Input::get('depto_id'))->get()->load('usuario','departamento');
            return Response::json($contrato);
        }
        return "Invalid session_code ";
    }


    private function formateoDatos($datos)
    {
        foreach ($datos as $dato){

            dd($dato->load('estado')->estado->tipo);
        }
    }

}
