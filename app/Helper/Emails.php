<?php namespace AlquilerAdmin\Helper;


use Illuminate\Support\Facades\Mail;

class Emails {

    public function enviarMail($view,$datos = [],$destinatario = [],$subject){
        Mail::queue($view, $datos, function($message) use ($destinatario,$subject)
        {
            $message->to($destinatario['email'], $destinatario['nombre'])->subject($subject);
        });
    }
}