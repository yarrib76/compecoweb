<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\CobroAlquileres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ReporteAlquileresAnual extends Controller {
    public function reporte(){
        $anio = Input::get('anio');
        $mesesPagos = [];
        $cobro_alquileres = CobroAlquileres::selectRaw('DATE_FORMAT(fecha_cobro, "%m-%Y") AS Month,sum(importe_alquiler) as sum, fecha_cobro')
            ->where('fecha_cobro', '>=' , $anio . '/01/01')
            ->where('fecha_cobro', '<=', $anio . '/12/31')
            ->groupBy('month')
            ->get();
        $mesesPagos = $this->initMesesPagos($mesesPagos);
        $mesesPagos = $this->obtengoSumPorMeses($cobro_alquileres,$mesesPagos);
        return $mesesPagos;
    }

    private function obtengoSumPorMeses($cobro_alquileres,$mesesPagos){
        foreach ($cobro_alquileres as $cobro_alquiler){
            $mes = date('m',strtotime($cobro_alquiler['fecha_cobro']));
            switch ($mes) {
                Case 1:
                    $mesesPagos[1] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 2:
                    $mesesPagos[2] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 3:
                    $mesesPagos[3] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 4:
                    $mesesPagos[4] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 5:
                    $mesesPagos[5] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 6:
                    $mesesPagos[6] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 7:
                    $mesesPagos[7] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 8:
                    $mesesPagos[8] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 9:
                    $mesesPagos[9] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 10:
                    $mesesPagos[10] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 11:
                    $mesesPagos[11] = ['Total' => $cobro_alquiler['sum']];
                    break;
                Case 12:
                    $mesesPagos[12] = ['Total' => $cobro_alquiler['sum']];
                    break;
            }
        }
        return $mesesPagos;
    }

    private function initMesesPagos($mesesPagos)
    {
        for ($i = 1; $i <= 12; $i++ ){
            $mesesPagos[$i] = ['Total' => 0];
        }
        return $mesesPagos;
    }
}
