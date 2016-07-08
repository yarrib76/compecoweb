<?php
/**
 * Created by PhpStorm.
 * User: yarrib76
 * Date: 6/5/16
 * Time: 10:20 AM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class CrearSession extends Controller
{
    //Creo un # aleatorio para la session del usuario
    static public function crearSessionId(){
        $session_id = rand(100,100000);
        return $session_id;
    }
}