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
        $cobro_alquileres = CobroAlquileres::groupBy('fecha_cobro')
            ->selectRaw('sum(importe_alquiler) as sum, fecha_cobro')
            ->where('fecha_cobro', '>=' , $anio . '/01/01')
            ->where('fecha_cobro', '<=', $anio . '/12/31')
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
                    $mesesPagos[1] = ['Enero' => $cobro_alquiler['sum']];
                    break;
                Case 2:
                    $mesesPagos[2] = ['Febrero' => $cobro_alquiler['sum']];
                    break;
                Case 3:
                    $mesesPagos[3] = ['Marzo' => $cobro_alquiler['sum']];
                    break;
                Case 4:
                    $mesesPagos[4] = ['Abril' => $cobro_alquiler['sum']];
                    break;
                Case 5:
                    $mesesPagos[5] = ['Mayo' => $cobro_alquiler['sum']];
                    break;
                Case 6:
                    $mesesPagos[6] = ['Junio' => $cobro_alquiler['sum']];
                    break;
                Case 7:
                    $mesesPagos[7] = ['Julio' => $cobro_alquiler['sum']];
                    break;
                Case 8:
                    $mesesPagos[8] = ['Agosto' => $cobro_alquiler['sum']];
                    break;
                Case 9:
                    $mesesPagos[9] = ['Septiempre' => $cobro_alquiler['sum']];
                    break;
                Case 10:
                    $mesesPagos[10] = ['Octubre' => $cobro_alquiler['sum']];
                    break;
                Case 11:
                    $mesesPagos[11] = ['Noviembre' => $cobro_alquiler['sum']];
                    break;
                Case 12:
                    $mesesPagos[12] = ['Diciembre' => $cobro_alquiler['sum']];
                    break;
            }
        }
        return $mesesPagos;
    }

    private function initMesesPagos($mesesPagos)
    {
        $mesesPagos[1] = ['Enero' => 0];
        $mesesPagos[2] = ['Febrero' => 0];
        $mesesPagos[3] = ['Marzo' => 0];
        $mesesPagos[4] = ['Abril' => 0];
        $mesesPagos[5] = ['Mayo' => 0];
        $mesesPagos[6] = ['Junio' => 0];
        $mesesPagos[7] = ['Julio' => 0];
        $mesesPagos[8] = ['Agosto' => 0];
        $mesesPagos[9] = ['Septiembre' => 0];
        $mesesPagos[10] = ['Octubre' => 0];
        $mesesPagos[11] = ['Noviembre' => 0];
        $mesesPagos[12] = ['Diciembre' => 0];

        return $mesesPagos;
    }
}
