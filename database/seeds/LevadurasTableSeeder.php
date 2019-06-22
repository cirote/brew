<?php

use App\Models\Laboratorio;
use Illuminate\Database\Seeder;

class LevadurasTableSeeder extends Seeder
{
    public function run()
    {
        Laboratorio::byNombre("Mangrove Jack's")
            ->levaduras()->create([
                'nombre' => 'M44',
                'descripcion' => 'U.S. West Coast Yeast',
                'atenuacion_maxima' => 85,
                'atenuacion_minima' => 77,
                'floculacion_maxima' => 5,
                'floculacion_minima' => 4,
                'tolerancia' => 11
            ]);
    }
}
