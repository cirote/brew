<?php

use App\Models\Laboratorio;
use Illuminate\Database\Seeder;
use Cirote\Scalar\Facade\Scalar;

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
                    'nombre' => 'S-04',
                    'descripcion' => 'Safale S-04',
                    'atenuacion_maxima' => 75,
                    'atenuacion_minima' => 72,
					'temperatura' => Scalar::Temperature('20 C')
                ], [
                    'nombre' => 'S-33',
                    'descripcion' => 'Safbrew S-33',
                    'atenuacion_maxima' => 85,
                    'atenuacion_minima' => 77,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11
                ], [
                    'nombre' => 'BE-134',
                    'descripcion' => 'SafAle BE-134',
					'temperatura' => Scalar::Temperature('24 C'),
                    'atenuacion_maxima' => 93,
                    'atenuacion_minima' => 89,
                    'tolerancia' => 10,
					// Datos a corregir
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                ], [
                    'nombre' => 'US 05',
                    'descripcion' => 'Safbrew S-5',
					// Datos a corregir
                    'atenuacion_maxima' => 85,
                    'atenuacion_minima' => 77,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11
                ], [
                    'nombre' => 'W-34/70',
                    'descripcion' => 'SafLager W-34/70',
					// Datos a corregir
                    'atenuacion_maxima' => 85,
                    'atenuacion_minima' => 77,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11,
                    // rango de temperatura 9 a 22 grados
                    // rango optimo 12 a 15 grados
                    // sedimentacion alta
                    // Gravedad final media
                ], [
                    'nombre' => 'S-23',
                    'descripcion' => 'SafLager German Lager Yeast S-23',
					// Datos a corregir
                    'atenuacion_maxima' => 82,
                    'atenuacion_minima' => 82,
                    'floculacion_maxima' => 5,
                    'floculacion_minima' => 4,
                    'tolerancia' => 11,
                ]
            ]);
    }
}
