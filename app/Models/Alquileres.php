<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class Alquileres extends Model {

    protected $table = 'alquileres';
    protected $fillable = ['user_id','depto_id', 'fecha_inicio', 'fecha_vencimiento', 'importe_alquiler','estado_alquiler'];

    public function usuario(){
        return $this->belongsTo('AlquilerAdmin\User', 'id');
    }

    public function departamento(){
        return $this->belongsTo('AlquilerAdmin\Models\Departamentos', 'id');
    }

}
