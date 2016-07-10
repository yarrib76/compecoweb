<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EstadosDeptos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EstadoDeptos extends Controller {

    public function listadoEstado(){
        return Response::json(EstadosDeptos::all());
    }
}
