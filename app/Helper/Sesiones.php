<?php namespace AlquilerAdmin\Helper;

use AlquilerAdmin\User;
use Illuminate\Support\Facades\Input;

class Sesiones
{
    public function validarSession($email,$inSession_id)
    {
        $session_id = User::where('email', $email)->first()->session_id;
        if ($session_id == $inSession_id){
            return true;
        }
        return false;
    }
}