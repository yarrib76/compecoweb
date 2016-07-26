<?php
use AlquilerAdmin\Models\Impuestos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddImpuestosSeeder extends Seeder {

    public function run()
    {
        DB::table('impuestos')->delete();
        $this->crearImpuestos();

    }

    private function crearImpuestos()
    {
        Impuestos::create([

            'nombre' => 'abl'
        ]);
        Impuestos::create([

            'nombre' => 'metrogas'
        ]);
        Impuestos::create([

            'nombre' => 'edesur'
        ]);
        Impuestos::create([

            'nombre' => 'expensas   '
        ]);
        return;
    }
}