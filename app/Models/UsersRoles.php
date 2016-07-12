<?php namespace AlquilerAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class UsersRoles extends Model {
    protected $table = 'users_roles';
    protected $fillable = ['user_id', 'role_id'];

    public function roles(){
        return $this->belongsTo('AlquilerAdmin\Models\Roles', 'role_id');
    }
}
