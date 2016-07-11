<?php
use AlquilerAdmin\Models\EstadosDeptos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDeptoSeeder extends Seeder
{
    public function run()
    {
        DB::table('estados_deptos')->delete();
        $this->crearEstadoDeptos();

    }

    private function crearEstadoDeptos()
    {
        EstadosDeptos::create([

            'tipo' => 'Alquilado'
        ]);
        EstadosDeptos::create([

            'tipo' => 'Libre'
        ]);
        EstadosDeptos::create([

            'tipo' => 'Reservado'
        ]);
        return;
    }
}