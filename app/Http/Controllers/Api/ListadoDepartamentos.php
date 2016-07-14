<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Departamentos;
use AlquilerAdmin\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ListadoDepartamentos extends Controller {

	public function listadoDeptos()
	{
        $control = $this->validarSession();
        if ($control){
            //$departamentos = $this->formateoDatos(Departamentos::all());
            return Response::json(Departamentos::all()->load('estado'));
        }
        return "Invalid session_code ";

	}

    private function validarSession()
    {
        $session_id = User::where('email', Input::get('email'))->first()->session_id;
        if ($session_id == Input::get('session_id')){
            return true;
        }
        return false;
    }

    private function formateoDatos($datos)
    {
        foreach ($datos as $dato){

            dd($dato->load('estado')->estado->tipo);
        }
    }

}
