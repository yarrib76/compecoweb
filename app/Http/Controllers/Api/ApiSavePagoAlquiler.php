<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

class ApiSavePagoAlquiler extends Controller {

    public function procesarPago(){
        $sesiones = new Sesiones();
        if ($sesiones->validarSession(Input::get('email'),Input::get('session_id'))){
            $this->guardarPago();
        }
        return "Invalid session_code ";
    }

    public function guardarPago(){

    }
}
