<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCobroAlquileres extends Model {

    protected $table = 'registro_cobro_alquileres';
    protected $fillable = ['fecha_pago','cobro_alquiler_id','importe_alquiler'];
}
