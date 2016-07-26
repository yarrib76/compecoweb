<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoImpuestos extends Model {
    protected $table = 'estado_impuestos';
    protected $fillable = ['impuesto_id','fecha_pago','estado_deuda_id','alquiler_id'];
}
