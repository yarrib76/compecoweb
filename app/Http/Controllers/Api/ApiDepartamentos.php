<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Helper\Sesiones;
use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\Alquileres;
use AlquilerAdmin\Models\Departamentos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
class ApiDepartamentos extends Controller {

	public function listadoDeptos()
	{
        $sesiones = new Sesiones();
        $control = $sesiones->validarSession(Input::get('email'),Input::get('session_id'));
        if ($control){
            //$departamentos = $this->formateoDatos(Departamentos::all());
            return Response::json(Departamentos::all()->load('estado'));
        }
        return "Invalid session_code ";

	}

    public function listadoContrato()
    {
        $sesiones = new Sesiones();
        $control = $sesiones->validarSession(Input::get('email'), Input::get('session_id'));
        if ($control) {
            //Solo obtengo los contratos de alquiler que estan activos
           //Creo el objeto contrato con relacion en usuario y departamento.
            $contrato = Alquileres::where('depto_id',Input::get('depto_id'))->where('estado_alquiler','1')->get()->load('usuario','departamento');
            $importe = $this->formateoDato($contrato);
            //Vuelvo a crear el objeto para quitar la relacion con AlquileresImporte que le agrego
            //en el metodo formateoDatos
            $contrato = Alquileres::where('depto_id',Input::get('depto_id'))->where('estado_alquiler','1')->get()->load('usuario','departamento');
            $contrato[0]->importe_alquiler = $importe;
            return Response::json($contrato);
        }
        return "Invalid session_code ";
    }


    /**
     * @param $datos
     * Formateo datos agregando el importe que corresponda
     */
    private function formateoDato($datos)
    {
        foreach ($datos as $dato)
        {
            $dato->load(['alquilerImportes' => function($query)
            {
                $query->orderBy('fecha','asc');
            }]);
            $importe = $this->verificoImporte($dato->alquilerImportes);
            return $importe;
        }
    }

    /**
     * @param $importes
     * Verifico que importe le corresponde segun el dd/mm/yyyy
     */
    private function verificoImporte($importes)
    {
      //  dd(Carbon::parse(date('c'))->format('d/m/Y'));
        $importe_alquiler = 0;
        $date = Carbon::now();
        $date->setTimezone('America/Argentina/Salta');
        $date = $date->format('Y-m-d');
        foreach ($importes as $importe)
        {
            if ($date >= $importe->fecha)
            {
                $importe_alquiler = $importe->importe_alquiler;
            }
        }
        return $importe_alquiler;
    }

}
