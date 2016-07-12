<?php
use AlquilerAdmin\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        $this->crearRoles();

    }

    private function crearRoles()
    {
        Roles::create([

            'nombre' => 'Admin'
        ]);
        Roles::create([

            'nombre' => 'Inquilino'
        ]);
        return;
    }
}