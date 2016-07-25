<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class CobroAlquileres extends Model {

    protected $table = 'cobro_alquileres';
    protected $fillable = ['alquiler_id','importe_alquiler','fecha_cobro','cobrador_id',
    'observaciones'];

}
