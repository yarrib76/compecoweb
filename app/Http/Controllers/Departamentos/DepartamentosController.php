<?php namespace AlquilerAdmin\Http\Controllers\Departamentos;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;
use AlquilerAdmin\Models\Departamentos;
use AlquilerAdmin\Models\EstadosDeptos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DepartamentosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $departamentos = Departamentos::get()->load('estado');
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
		Departamentos::create([
			'direccion' => Input::get('direccion'),
			'estado_id' => Input::get('estado_id'),
		]);
		return redirect()->route('departamento.index');
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
		$departamento = Departamentos::find($id);
		$estados = $this->formateoDatosEstadoDeptos(EstadosDeptos::all());
		$estado_id = $departamento->estado_id;
		return view ('departamentos.edit', compact('departamento','estado_id','estados'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		db::table('departamentos')
			->where('id', $id)
			->update([
				'direccion' => Input::get('direccion'),
				'estado_id' => Input::get('estado_id')
			]);
		return redirect()->route('departamento.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento = Departamentos::find($id);
		$departamento->delete();
		return redirect()->route('departamento.index');
	}

    //Paso los datos a un array para porder levantarlo con el select de EstadoDeptos
    public function formateoDatosEstadoDeptos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->id] = $dato->tipo;
        }
        return $conFormato;
    }

	private function conviertoJson()
	{
		return json_encode(EstadosDeptos::all());
	}
}
