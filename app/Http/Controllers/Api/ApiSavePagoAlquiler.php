<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\CobroAlquileres;
use AlquilerAdmin\Models\RegistroCobroAlquileres;
use AlquilerAdmin\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ApiSavePagoAlquiler extends Controller {

    public function procesarPago(){
        $sesiones = new Sesiones();
        if ($sesiones->validarSession(Input::get('email'),Input::get('session_id'))){
            //Si hay un pago parcial, le sumo el nuevo pago. Si no creo un nuevo pago
            if (!$this->verificoPagoAnterior()){
                $this->creoPago();
            }
            // Retorna 1 si se grabo el dato correctamente.
            return ['codigo' => 1];
        }else{
            return "Invalid session_code ";
        }
    }

    public function creoPago(){
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

    public function actualizoPago($cobroAlquilerId, $importeActual, $importeAlquiler){
        db::table('cobro_alquileres')
            ->where('id', $cobroAlquilerId)
            ->update([
                'importe_alquiler' => $importeActual + $importeAlquiler,
                'observaciones' => Input::get('observaciones'),
            ]);
        $this->creoRegistroDelCobro($cobroAlquilerId,$importeAlquiler);
    }
    /*
     * Verifico si hay algun pago parcial.
     * Si hay, le sumo el nuevo pago
     */
    public function verificoPagoAnterior(){
        $fechaCobro = date('m-Y', strtotime(Input::get('fecha_cobro')));
        $año = date('Y', strtotime(Input::get('fecha_cobro')));
        $cobroAlquileres = CobroAlquileres::orderBy('fecha_cobro', 'asc')
            ->where('fecha_cobro', '>=' , $año . '/01/01')
            ->where('fecha_cobro', '<=', $año . '/12/31')
            ->where('alquiler_id',Input::get('alquiler_id'))->get();
        foreach ($cobroAlquileres  as $cobroAlquiler){
            $mesAnio = date('m-Y',strtotime($cobroAlquiler->fecha_cobro));
            if ($fechaCobro == $mesAnio){
                $this->actualizoPago($cobroAlquiler->id, $cobroAlquiler->importe_alquiler,
                    Input::get('importe_alquiler'));
                return true;
            }
        }
    }

    /*
     * Esta funcion registra los cobros parciales de alquiler.
     * Si se paga el total no registra.
     * Ejemplo (Si un inquilino paga el alquiler en varias veces, se regitran
     * los pagos adicionales)
     */
    public function creoRegistroDelCobro($cobroAlquilerId,$importeAlquiler){
        RegistroCobroAlquileres::create([
            'fecha_pago' => Input::get('fecha_cobro'),
            'cobro_alquiler_id' => $cobroAlquilerId,
            'importe_alquiler' => $importeAlquiler,
            ]);
    }
}
