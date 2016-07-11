<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosDeuda extends Model {
    protected $table = 'estados_deudas';
    protected $fillable = ['tipo'];
}
