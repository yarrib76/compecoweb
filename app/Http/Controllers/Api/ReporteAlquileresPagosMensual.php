<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\CobroAlquileres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReporteAlquileresPagosMensual extends Controller {

    public function reporte(){
        $anio = Input::get('anio');
        $mes = Input::get('mes');
        $cobro_alquileres_mensual = CobroAlquileres::where('fecha_cobro', '>=' , $anio . '/' . $mes . '/01')
            ->where('fecha_cobro', '<=', $anio . '/'. $mes . '/31')
            ->get()
            ->load('alquileres');
        $resultado = $this->listaCobrosPorInquiulinos($cobro_alquileres_mensual);
        return Response::json($resultado);
	}

    private function listaCobrosPorInquiulinos($cobro_alquileres_mensual){
        $inquilinosQuePagaron = [];
        foreach ($cobro_alquileres_mensual as $cobro ){
         #   if ($cobro['alquileres']->estado_alquiler <> 0){
                $inquilinosQuePagaron[] = ['id' => $cobro['alquileres']->load('usuario')->usuario->id,
                'inquilino' => $cobro['alquileres']->load('usuario')->usuario->name,
                'importe' => $cobro->importe_alquiler ];
         #   }
        }
        return $inquilinosQuePagaron;
    }
}
