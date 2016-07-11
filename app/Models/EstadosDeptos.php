<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosDeptos extends Model {
    protected $table = 'estados_deptos';
    protected $fillable = ['tipo'];
}
