<?php namespace AlquilerAdmin\Http\Controllers\Api;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\EstadosDeptos;
use Illuminate\Support\Facades\Response;

class EstadoDeptos extends Controller {

    public function listadoEstado(){
        return Response::json(EstadosDeptos::all());
    }
}
