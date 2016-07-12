<?php namespace AlquilerAdmin\Http\Controllers\ContratosAlquiler;

use AlquilerAdmin\Http\Requests;
use AlquilerAdmin\Http\Controllers\Controller;

use AlquilerAdmin\Models\Alquileres;
use AlquilerAdmin\Models\Departamentos;
use AlquilerAdmin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContratosAlquilerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contratosAlquileres = Alquileres::all()->load('usuario','departamento');
		return view('contratosalquiler.reporte', compact('contratosAlquileres'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamentos = Departamentos::all()->load('estado');
        $departamentos = $this->formateoDatos($departamentos);
        $inquilinos = User::all()->load('userRoles');
        $inquilinos = $this->formateoDatosInquilinos($inquilinos);
        return view('contratosalquiler.nuevo', compact('departamentos','inquilinos'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $departamento = new Departamentos();
        $departamento->cambioEstadoDepto(Input::get('departamento_id'),'Alquilado');
        Alquileres::create([
            'user_id' => Input::get('inquilino_id'),
            'depto_id' => Input::get('departamento_id'),
            'importe_alquiler' => Input::get('costo'),
            'estado_alquiler' => true,
        ]);

        return redirect()->route('contratoAlquiler.index');
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

		$alquiler = Alquileres::find($id);
        $alquiler->delete();
        $departamento_id = $alquiler->depto_id;
        $departamento = new Departamentos();
        $departamento->cambioEstadoDepto($departamento_id,'Libre');
        return redirect()->route('contratoAlquiler.index');
	}

    //Paso los datos a un array para porder levantarlo con el select
    public function formateoDatos($datos){
        $conFormato = "";
        foreach ($datos as $dato) {
            if ($dato->estado->tipo == "Libre") {
                $conFormato[$dato->id] = $dato->direccion;
            }
        }
        if ($conFormato == "") {
            $conFormato[0] = "***Sin Disponibilidad***";
        }
        return $conFormato;
    }

    //Paso los datos a un array para porder levantarlo con el select de Inquilino
    public function formateoDatosInquilinos($datos){
        $conFormato = "";
        foreach ($datos as $dato) {
            if ($dato->userRoles->load('roles')->roles->nombre == "Inquilino") {
                $conFormato[$dato->id] = $dato->name;
            }
        }
        if ($conFormato == "") {
            $conFormato[0] = "***Sin Disponibilidad***";
        }
        return $conFormato;
    }
}
