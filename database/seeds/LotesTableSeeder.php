<?php

use App\Models\{Lupulo, Malta, Receta};
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LotesTableSeeder extends Seeder
{
    public function run()
    {
        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 6, 8),
            'receta' => 'Cerveza de Trigo Belga',
            'maltas' => [[
                'nombre' => 'Pale 2-Row',
                'cantidad' => 6100,
                'unidad' => 'gr'
            ], [
                'nombre' => 'Castle Crystal',
                'cantidad' => 500,
                'unidad' => 'gr'
            ]],
            'lupulos' => [[
                'nombre' => 'Magnum',
                'cantidad' => 23.6,
                'momento' => -75
            ], [
                'nombre' => 'Styrian Golding',
                'cantidad' => 23.6,
                'momento' => -5
            ]],
            'envasado' => [
                'fecha' => Carbon::create(2019, 6, 20),
                'resultado' => [
                    [
                        'envase' => 'botella',
                        'volumen' => 330,
                        'cantidad' => 5
                    ], [
                        'envase' => 'botella',
                        'volumen' => 500,
                        'cantidad' => 39
                    ], [
                        'envase' => 'botella',
                        'volumen' => 710,
                        'cantidad' => 5
                    ]
                ]
            ]
        ]);

        $this->agregarLote([
            'receta' => 'Sierra Nevada',
            'brewed_at' => Carbon::create(2019, 6, 22),
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Pale 2-Row',
                        'gramos' => 6100
                    ], [
                        'nombre' => 'Castle Crystal',
                        'gramos' => 500
                    ]
                ],
                'agua' => [
                    [
                        'nombre' => 'inicial',
                        'cantidad' => 20,
                    ], [
                        'nombre' => 'lavado',
                        'cantidad' => 11.5,
                    ], [
                        'nombre' => 'colchon',
                        'cantidad' => 3,
                    ]
                ],
                'etapas' => [
                    [
                        'tiempo' => 60,
                        'temperatura' => 65
                    ], [
                        'tiempo' => 10,
                        'temperatura' => 74
                    ], [
                        'tiempo' => 10,
                        'temperatura' => 78
                    ]
                ],
                'densidad' => 1.047,
                'volumen_final' => 27
            ],
            'hervido' => [
                'minutos' => 70,
                'lupulos' => [
                    [
                        'nombre' => 'Magnum',
                        'cantidad' => 14.88,
                        'minutos' => -60
                    ], [
                        'nombre' => 'Perle',
                        'cantidad' => 14.90,
                        'minutos' => -30
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => 14.72,
                        'minutos' => -10
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => 29.48,
                        'unidad' => 'oz',
                        'minutos' => 0
                    ]
                ],
            ],
            'fermentacion' => [
                'volumen_inicial' => 23,
                'levadura' => [
                    'nombre' => 'M44',
                    'cantidad' => 10
                ],
                'dry-hop' => [
                    'lupulos' => [
                        [
                            'nombre' => 'Cascade',
                            'cantidad' => 29.48,
                            'dias' => 4
                        ]
                    ],
                ]
            ]
        ]);
    }

    private function agregarLote($receta)
    {
        $r = Receta::byNombre($receta['receta'])
            ->lotes()->create([
                'brewed_at' => $receta['brewed_at']
            ]);

        foreach ($receta['maltas'] as $malta)
            $r->maltas()
                ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);

        foreach ($receta['lupulos'] as $lupulo)
            $r->lupulos()
                ->save(Lupulo::byNombre($lupulo['nombre']), [
                    'cantidad' => $lupulo['cantidad'],
                    'momento' => $lupulo['momento']
                ]);
    }
}
