<?php namespace App\Http\Controllers\Departamentos;

use App\Http\Controllers\Api\EstadoDeptos;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Departamentos;
use App\Models\EstadosDeptos;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $departamentos = Departamentos::get();
        return view('departamentos.reporte', compact('departamentos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $estados = EstadosDeptos::all();
        $estados = $this->formateoDatosEstadoDeptos($estados);
        return view ('departamentos.nuevo', compact('estados'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    //Paso los datos a un array para porder levantarlo con el select de Profesores
    public function formateoDatosEstadoDeptos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->id] = $dato->tipo;
        }
        return $conFormato;
    }
}
