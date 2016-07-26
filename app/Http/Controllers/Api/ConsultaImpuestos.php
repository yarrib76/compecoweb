<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Impuestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ConsultaImpuestos extends Controller {

    public function consulta(){
        $impuestos = Impuestos::all();
        return Response::json($impuestos);
    }
}
