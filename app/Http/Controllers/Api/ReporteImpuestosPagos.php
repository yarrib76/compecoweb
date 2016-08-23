<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\EstadoImpuestos;
use AlquilerAdmin\Models\ImporteAlquileres;
use AlquilerAdmin\Models\Impuestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReporteImpuestosPagos extends Controller {

    public function reportes(){
        $anio = Input::get('anio');
        /*
         * Query de los impuestos pagos por alquiler_id,
         * ordenado por fecha y filtrado por año
         */
        $cobroImpuestos = EstadoImpuestos::orderBy('fecha_pago', 'asc')
            ->where('fecha_pago', '>=' , $anio . '/01/01')
            ->where('fecha_pago', '<=', $anio . '/12/31')
            ->where('alquiler_id',Input::get('alquiler_id'))->get();
        $meses = $this->formateoData($cobroImpuestos);
        return Response::json($meses);
    }

    /*
     * Preparo los datos con formato.
     * Por cada mes segun fecha de Pago, modifico el array y le agrego
     * 1 al impuesto que corrsponda.
     */
    private function formateoData($cobroImpuestos)
    {
        $meses = $this->initMeses();
        $mesesConInpuestosPagos = $this->initImpuestos($meses);
        foreach ($cobroImpuestos as $cobroImpuesto){
            $mes = date('m',strtotime($cobroImpuesto->fecha_pago));
            switch ($mes){
                Case 1:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[1][$impuesto[0]->nombre] = 1;
                    break;
                Case 2:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[2][$impuesto[0]->nombre] = 1;
                    break;
                Case 3:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[3][$impuesto[0]->nombre] = 1;
                    break;
                Case 4:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[4][$impuesto[0]->nombre] = 1;
                    break;
                Case 5:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[5][$impuesto[0]->nombre] = 1;
                    break;
                Case 6:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[6][$impuesto[0]->nombre] = 1;
                    break;
                Case 7:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[7][$impuesto[0]->nombre] = 1;
                    break;
                Case 8:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[8][$impuesto[0]->nombre] = 1;
                    break;
                Case 9:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[9][$impuesto[0]->nombre] = 1;
                    break;
                Case 10:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[10][$impuesto[0]->nombre] = 1;
                    break;
                Case 11:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[11][$impuesto[0]->nombre] = 1;
                    break;
                Case 12:
                    $impuesto = Impuestos::where('id',$cobroImpuesto->impuesto_id)->get();
                    $mesesConInpuestosPagos[12][$impuesto[0]->nombre] = 1;
                    break;
            }
        }
        return $mesesConInpuestosPagos;
    }

    /*
 * Funcion para Crear/inicializar array
 */
    public function initMeses(){
        for ($i = 1; $i <= 12; $i++ ){
            $meses[$i] = [];
        }
        return $meses;
    }
    /*
    * Funcion para caragr los impuestos e inicializar los impuestos en 0
    */
    public function initImpuestos($meses){
        $impuestos = Impuestos::all();
        for ($i = 1; $i <= 12; $i++ ){
            foreach ($impuestos as $impuesto){
                $meses[$i] = $meses[$i] + [$impuesto->nombre => 0];
            }
        }
        return $meses;
    }
}
