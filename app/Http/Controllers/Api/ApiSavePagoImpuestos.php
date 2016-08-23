<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\EstadoImpuestos;
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
        //Ejemplo url http://compraweb.com:8000/api/control_pago_impuestos?email=yarrib76@gmail.com&&session_id=0&&alquiler_id=1&&fecha_pago=2016-09-02&&abl=2&&metrogas=2&&edesur=2&&expensas=2
        $impuestos['abl'] = Input::get('abl');
        $impuestos['metrogas'] = Input::get('metrogas');
        $impuestos['edesur'] = Input::get('edesur');
        $impuestos['expensas'] = Input::get('expensas');
        $impuestos['aysa'] = Input::get('aysa');
        $abl_id = Impuestos::where('nombre','abl')->first()->id;
        $metrogas_id = Impuestos::where('nombre','metrogas')->first()->id;
        $edesur_id = Impuestos::where('nombre','edesur')->first()->id;
        $expensas_id = Impuestos::where('nombre','expensas')->first()->id;
        $aysa_id = Impuestos::where('nombre','aysa')->first()->id;
        if ($impuestos['abl'] == 1){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $abl_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Al Dia'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        } elseif ($impuestos['abl'] == 2){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $abl_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Tiene Deuda'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        }
        if ($impuestos['metrogas'] == 1){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $metrogas_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Al Dia'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        } elseif ($impuestos['metrogas'] == 2){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $metrogas_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Tiene Deuda'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        }
        if ($impuestos['edesur'] == 1){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $edesur_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Al Dia'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        } elseif($impuestos['edesur'] == 2){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $edesur_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Tiene Deuda'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        }
        if ($impuestos['expensas'] == 1){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $expensas_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Al Dia'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        } elseif($impuestos['expensas'] == 2){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $expensas_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Tiene Deuda'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        }
        if ($impuestos['aysa'] == 1){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $aysa_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Al Dia'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        } elseif($impuestos['aysa'] == 2){
            $estadoDeudaId = new EstadosDeuda();
            EstadoImpuestos::create([
                'impuesto_id' => $aysa_id,
                'fecha_pago' => Input::get('fecha_pago'),
                'estado_deuda_id'=>$estadoDeudaId->obtengoEstadoId('Tiene Deuda'),
                'alquiler_id' => Input::get('alquiler_id')
            ]);
        }
    }
}
