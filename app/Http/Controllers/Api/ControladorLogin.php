<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorLogin extends Controller {

	public function loginUsuarios()
	{
		$repuesta = $this->exsisteUsuario();
		if($repuesta){
			$password = $this->validarPassword($repuesta, Input::get('password'));
			return Response::json($password);
		}
		return Response::json([ 'valor' => 0]);
	}

	//Verifica si existe el usuario, si existe retorna el objeto usuario,
	//de lo contrario retorna 0
	public function exsisteUsuario()
	{
		$usuario = User::where('email', Input::get('email'))->first();
		if ($usuario){
			return $usuario;
		}
		return 0;
	}

	//Verifica si la password es correcta
	//Si es correcta Retorna 1
	// de lo contrario retorna 2;
	public function validarPassword($usuario, $password)
	{
		if (Hash::check($password, $usuario->password)){
			$session_id = CrearSession::crearSessionId();
			$usuario->update(['session_id' => $session_id]);
			return [ 'valor' => $session_id];
		}
		return [ 'valor' => 2];
	}


}
