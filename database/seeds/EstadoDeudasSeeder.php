<?php
use AlquilerAdmin\Models\EstadosDeuda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDeudasSeeder extends Seeder
{
    public function run()
    {
        DB::table('estado_impuestos')->delete();
        $this->crearEstadoDeudas();

    }

    private function crearEstadoDeudas()
    {
        EstadosDeuda::create([

            'tipo' => 'Al Dia'
        ]);
        EstadosDeuda::create([

            'tipo' => 'Tiene Deuda'
        ]);
        EstadosDeuda::create([

            'tipo' => 'En Observacion'
        ]);
        return;
    }
}