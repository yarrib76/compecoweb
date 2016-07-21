<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class ImporteAlquileres extends Model {

    protected $table = 'importe_alquileres';
    protected $fillable = ['id','alquiler_id', 'fecha', 'importe_alquiler'];

}
