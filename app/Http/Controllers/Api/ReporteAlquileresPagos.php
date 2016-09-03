<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Alquileres;
use AlquilerAdmin\Models\CobroAlquileres;
use AlquilerAdmin\Models\ImporteAlquileres;
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
            $mes = date('m',strtotime($cobroAlquiler->fecha_cobro));
            switch ($mes){
                Case 1:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[1] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
               //     $mesesPagos[1] = 1;
                    break;
                Case 2:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[2] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 3:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[3] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 4:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[4] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 5:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[5] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 6:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    // $mesesPagos[6] = 1;
                    $mesesPagos[6] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 7:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[7] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 8:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[8] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 9:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[9] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 10:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[10] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 11:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[11] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
                    break;
                Case 12:
                    $estado = $this->verificoEstado($cobroAlquiler);
                    $mesesPagos[12] = ['Estado' => $estado, 'Importe' => $cobroAlquiler->importe_alquiler];
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

    public function verificoEstado($cobroAlquiler){
        $estado = 0;
        $importesAlquileres = ImporteAlquileres::orderBy('fecha', 'asc')
        ->where('alquiler_id',Input::get('alquiler_id'))->get();
        foreach ($importesAlquileres as $importesAlquiler)
        {
            if ($cobroAlquiler->fecha_cobro >= $importesAlquiler->fecha)
            {
                if ($cobroAlquiler->importe_alquiler < $importesAlquiler->importe_alquiler){
                    $estado = 2;
                } else {
                    $estado = 1;
                }
            }
        }
        return $estado;
    }
}
