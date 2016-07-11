<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model {
    protected $table = 'departamentos';
    protected $fillable = ['direccion','estado_id'];

    public function estado(){
        return $this->belongsTo('AlquilerAdmin\Models\EstadosDeptos', 'estado_id');
    }
}
