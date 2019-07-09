<?php

use App\Models\{Lupulo, Malta, Receta};
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;

class LotesTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('weight', new ConfigWeight());

        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 6, 8),
            'receta' => 'Cerveza de Trigo Belga',
            'macerado' => [
                'maltas' => [[
                    'nombre' => 'Pale 2-Row',
                    'cantidad' => 6100
                ], [
                    'nombre' => 'Castle Crystal',
                    'cantidad' => 500
                ]],
            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Magnum',
                    'cantidad' => new Weight('23.6 kg'),
                    'momento' => -75
                ], [
                    'nombre' => 'Styrian Golding',
                    'cantidad' => new Weight('23.6 lb'),
                    'momento' => -5
                ]],
            ],
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
                        'cantidad' => 6100
                    ], [
                        'nombre' => 'Castle Crystal',
                        'cantidad' => 500
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
                        'cantidad' => new Weight('14.88 gr'),
                        'momento' => -60
                    ], [
                        'nombre' => 'Perle',
                        'cantidad' => new Weight('14.90 gr'),
                        'momento' => -30
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => new Weight('14.72 gr'),
                        'momento' => -10
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => new Weight('29.48 gr'),
                        'unidad' => 'oz',
                        'momento' => 0
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
                            'fecha' => Carbon::create(2019, 6, 25,21),
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

        foreach ($receta['macerado']['maltas'] as $malta)
            $r->maltas()
                ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);

        foreach ($receta['hervido']['lupulos'] as $lupulo)
            $r->lupulos()
                ->save(Lupulo::byNombre($lupulo['nombre']), [
                    'cantidad' => $lupulo['cantidad'],
                    'momento' => $lupulo['momento']
                ]);
    }
}
