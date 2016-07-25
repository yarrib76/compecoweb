<?php namespace AlquilerAdmin\Http\Controllers\ContratosAlquiler;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Alquileres;
use AlquilerAdmin\Models\ImporteAlquileres;
use Illuminate\Support\Facades\Input;

class ImporteAlquilerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contrato_id = Input::get('contrato_id');
        $importesAlquiler = ImporteAlquileres::where('alquiler_id', $contrato_id)->get();
        $direccion = Alquileres::find($contrato_id)->load('departamento')->departamento->direccion;
        return view('ContratosAlquiler.importes.reporte', compact('importesAlquiler', 'contrato_id', 'direccion'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $contrato_id = (Input::get('contrato_id'));
        return view('ContratosAlquiler.importes.nuevo', compact('contrato_id'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        ImporteAlquileres::create([
            'fecha' => Input::get('fecha'),
            'importe_alquiler' => Input::get('costo'),
            'alquiler_id' => Input::get('contrato_id'),
        ]);
        return redirect()->route('contratoAlquilerImporte.index', ['contrato_id' => Input::get('contrato_id')] );
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
        $importeAlquiler = ImporteAlquileres::find($id);
        $importeAlquiler->delete();
        return redirect()->route('contratoAlquilerImporte.index', ['contrato_id' => Input::get('contrato_id')] );

    }

}
