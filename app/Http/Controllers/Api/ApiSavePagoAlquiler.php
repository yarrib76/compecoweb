<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\CobroAlquileres;
use AlquilerAdmin\User;
use Illuminate\Support\Facades\Input;

class ApiSavePagoAlquiler extends Controller {

    public function procesarPago(){
        $sesiones = new Sesiones();
        if ($sesiones->validarSession(Input::get('email'),Input::get('session_id'))){
            $this->guardarPago();
            // Retorna 1 si se grabo el dato correctamente.
            return ['codigo' => 1];
        }else{
            return "Invalid session_code ";
        }
    }

    public function guardarPago(){
        $cobrador_id = User::where('email', Input::get('email'))->get();
        $cobrador_id = $cobrador_id[0]->id;
        CobroAlquileres::create([
            'alquiler_id' => Input::get('alquiler_id'),
            'cobrador_id' => $cobrador_id,
            'fecha_cobro' => Input::get('fecha_cobro'),
            'observaciones' => Input::get('observaciones'),
            'importe_alquiler' => Input::get('importe_alquiler')
        ]);
    }
}
