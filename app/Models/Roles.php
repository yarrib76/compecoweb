<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {
    protected $table = 'roles';
    protected $fillable = ['nombre'];
}
