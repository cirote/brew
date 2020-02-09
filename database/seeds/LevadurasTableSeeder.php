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

        Laboratorio::byNombre("Fermentis, by Lesaffre")
            ->levaduras()->createMany([
                [
                    'nombre' => 'S-33',
                    'descripcion' => 'Safbrew S-33',
                    'atenuacion_maxima' => 85,
                    'atenuacion_minima' => 77,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11
                ], [
                    'nombre' => 'W-34/70',
                    'descripcion' => 'SafLager W-34/70',
                    'atenuacion_maxima' => 85,
                    'atenuacion_minima' => 77,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11,
                    // rango de temperatura 9 a 22 grados
                    // rango optimo 12 a 15 grados
                    // sedimentacion alta
                    // Gravedad final media
                ]
            ]);
    }
}
