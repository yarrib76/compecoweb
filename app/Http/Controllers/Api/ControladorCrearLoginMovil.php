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
            if ($esValido['valor'] == 0 ){
                $respuesta = $this->crear($email,$password);
                return Response::json($respuesta);
            }
            return Response::json($esValido);
        }
        return null;
    }

    // Verifico que el mail y password no vengan vacios
    // Si los el email y el password tienen datos devuelve valor = 0;
    // Si falta el email valor = 1;
    // Si falta la passowrd Valor = 2
    // Si falta el email y la password valor = 3
    public function validacion($email,$password){
        $repuesta = 0;
        $cont = 0;
        if (empty($email)){
            $cont = $repuesta + 1;
            $repuesta = [ 'valor' => $cont];
        }
        if (empty($password)){
            $cont = $cont + 2;
            $repuesta = [ 'valor' => $cont];
        }
        return $repuesta;
    }

    //Creo el usuario con la password encriptada
    //Si el usuario ya existia devuelve valor = 4
    //Si lo crea devuelve un random
    public function crear($email,$password){
        $usuario = User::where("email",$email)->first();
        if ($usuario){
            return $repuesta = [ 'valor' => 4];
        }
        $session_id = $this->crearSessionId();
        User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'session_id' => $session_id,
        ]);
        $repuesta = [ 'valor' => $session_id];
        return $repuesta;
    }

    //Creo un # aleatorio para la session del usuario
    public function crearSessionId(){
        $session_id = rand(100,100000);
        return $session_id;
    }
}
