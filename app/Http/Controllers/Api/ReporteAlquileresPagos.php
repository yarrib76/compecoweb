<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\CobroAlquileres;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReporteAlquileresPagos extends Controller {

    public function reportes(){
        $anio = Input::get('anio');
        $cobroAlquileres = CobroAlquileres::orderBy('fecha_cobro', 'asc')
            ->where('fecha_cobro', '>=' , $anio . '/01/01')
            ->where('fecha_cobro', '<=', $anio . '/12/31')
            ->where('alquiler_id',Input::get('alquiler_id'))->get();
        $meses = $this->obtengoMeses($cobroAlquileres);
        return Response::json($meses);
}

    /*
     * Obtengo el mes pago, si el Mes = 1 esta pago si no
     * es Mes = 0
     */
    public function obtengoMeses($cobroAlquileres){

        $mesesPagos = $this->initMeses();
        foreach($cobroAlquileres as $cobroAlquiler){
            //dd($cobroAlquiler->fecha_cobro);
            $mes = date('m',strtotime($cobroAlquiler->fecha_cobro));
            switch ($mes){
                Case 1:
                    $mesesPagos[1] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
               //     $mesesPagos[1] = 1;
                    break;
                Case 2:
                    $mesesPagos[2] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 3:
                    $mesesPagos[3] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 4:
                    $mesesPagos[4] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 5:
                    $mesesPagos[5] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 6:
                   // $mesesPagos[6] = 1;
                    $mesesPagos[6] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 7:
                    $mesesPagos[7] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 8:
                    $mesesPagos[8] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 9:
                    $mesesPagos[9] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 10:
                    $mesesPagos[10] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 11:
                    $mesesPagos[11] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 12:
                    $mesesPagos[12] = ['Estado' => 1, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
            }
        }
        return $mesesPagos;
    }

    /*
     * Funcion para inicializar los meses en 0
     */
    public function initMeses(){
        for ($i = 1; $i <= 12; $i++ ){
            $meses[$i] = ['Estado' => 0, 'Importe' => 0];
        }
        return $meses;
    }
}
