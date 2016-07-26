<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\EstadosDeuda;
use AlquilerAdmin\Models\Impuestos;
use Illuminate\Support\Facades\Input;

class ApiSavePagoImpuestos extends Controller{
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

    private function guardarPago()
    {
        $impuestos['abl'] = Input::get('abl');
        $impuestos['metrogas'] = Input::get('metrogas');
        $impuestos['edesur'] = Input::get('edesur');
        $impuestos['expensas'] = Input::get('espensas');
        $abl_id = Impuestos::where('nombre','abl')->first()->id;
        $metrogas_id = Impuestos::where('nombre','metrogas')->first()->id;
        $edesur_id = Impuestos::where('nombre','edesur')->first()->id;
        $expensas_id = Impuestos::where('nombre','expensas')->first()->id;
        if ($impuestos['abl'] == 1){
            EstadosDeuda::create([
                'impuesto_id' => $abl_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id' 
            ]);
        }
        if ($impuestos['metrogas'] == 1){

        }
        if ($impuestos['edesur'] == 1){

        }
        if ($impuestos['expensas' == 1 ]){

        }
    }
}
