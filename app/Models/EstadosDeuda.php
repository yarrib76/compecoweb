<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosDeuda extends Model {
    protected $table = 'estados_deudas';
    protected $fillable = ['tipo'];

    public function obtengoEstadoId($estado){
        return $estado_id = $this->where('tipo',$estado )->get()->first()->id;
    }
}
