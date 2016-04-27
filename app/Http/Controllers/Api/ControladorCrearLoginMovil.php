<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorCrearLoginMovil extends Controller {

    public function crearUsuario(){
        $email = Input::get('email');
        $password = Input::get('password');
        $codigoValidacion = Input::get('codval');
        if ($codigoValidacion == 4015){
            $esValido = $this->validacion($email,$password);
            if ($esValido[0]['valor'] == "0" and $esValido[1]['valor'] == "1" ){
                $respuesta = $this->crear($email,$password);
                return Response::json($respuesta);
            }
            return Response::json($esValido);
        }
        return null;
    }

    // Verifico que el mail y password no vengan vacios
    public function validacion($email,$password){
        $repuesta[0] = ['valor' => "0"];
        $repuesta[1] = ['valor' => "1"];
        if (empty($email)){
            $repuesta[0] = ['valor' => 'Ingresar un Mail'];
        }
        if (empty($password)){
            $repuesta[1] = ['valor' => 'Ingresar Una clave'];
        }
        return $repuesta;
    }

    //Creo el usuario con la password encriptada
    public function crear($email,$password){
        $usuario = User::where("email",$email)->first();
        if ($usuario){
            return $repuesta[0] = ['valor' => 'El usuario ya Existe'];
        }
        User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $repuesta[0] = ['valor' => "2"];
        return $repuesta;
    }
}
