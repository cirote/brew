<?php

use App\Models\Laboratorio;
use Illuminate\Database\Seeder;

class LaboratoriosTableSeeder extends Seeder
{
    public function run()
    {
        Laboratorio::create([
            'nombre' => "Mangrove Jack's"
        ]);

        Laboratorio::create([
            'nombre' => "Fermentis, by Lesaffre"
        ]);
    }
}
