<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\CobroAlquileres;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteAlquileresPagos extends Controller {

    public function reportes(){
        $cobroAlquileres = CobroAlquileres::orderBy('fecha_cobro', 'asc')->get();
        $this->obtengoMes($cobroAlquileres);
}

    public function obtengoMes($cobroAlquileres){
        foreach($cobroAlquileres as $cobroAlquiler){
            //dd($cobroAlquiler->fecha_cobro);
            $mes = Carbon::getWeekendDays($cobroAlquiler->fecha_cobro);
            dd($mes[0]);
        }
    }
}
