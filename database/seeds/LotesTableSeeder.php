<?php

use App\Models\{Lupulo, Malta, Receta};
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;

class LotesTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('weight', new ConfigWeight());

        Config::registerDefault('volume', new ConfigVolume());

        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 7, 21),
            'receta' => 'Cerveza de marzo',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Château Pilsen 2RS',
                        'cantidad' => new Weight('3.5 kg'),
                    ], [
                        'nombre' => 'Château Cara Ruby',
                        'cantidad' => new Weight('2.6 kg'),
                    ], [
                        'nombre' => 'Château Biscuit',
                        'cantidad' => new Weight('599 g'),
                    ], [
                        'nombre' => 'CaraAmber',
                        'cantidad' => new Weight('285 g'),
                    ]
                ],
                'volumen_vivo' => new Volume('31 l'),
                'volumen_total' => new Volume('34 l'),
                'volumen_post_hervido_calculado' => new Volume('28.07 l'),
                'gravedad_pre_hervido' => 1.050,
                'temperatura_medicion' => 78.5,
                'gravedad_inicial_calculada' => 1.061

            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Columbus',
                    'cantidad' => new Weight('27.73 g'),
                    'minutos_antes_de_finalizar_hervor' => 70
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('6.86'),
                    'minutos_antes_de_finalizar_hervor' => 10
                ]],
                'volumen_en_el_fermentador' => new Volume('26 l'),
                'volumen_total' => new Volume('27.5 l'),
            ],
            'envasado' => [
                'fecha' => Carbon::create(2019, 7, 20),
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
            'brewed_at' => Carbon::create(2019, 7, 13),
            'receta' => 'Cerveza Belga Stout',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Château Pilsen 2RS',
                        'cantidad' => new Weight('5.7 kg'),
                    ], [
                        'nombre' => 'Château Cara Gold',
                        'cantidad' => new Weight('450 g'),
                    ], [
                        'nombre' => 'Château Chocolat',
                        'cantidad' => new Weight('740 g'),
                    ], [
                        'nombre' => 'Château Black',
                        'cantidad' => new Weight('150 g'),
                    ], [
                        'nombre' => 'Château Special B',
                        'cantidad' => new Weight('90 g'),
                    ]
                ],
                'volumen_vivo' => new Volume('31 l'),
                'volumen_total' => new Volume('34 l'),
                'volumen_post_hervido_calculado' => new Volume('28.07 l'),
                'gravedad_pre_hervido' => 1.050,
                'temperatura_medicion' => 78.5,
                'gravedad_inicial_calculada' => 1.061

            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Columbus',
                    'cantidad' => new Weight('27.73 g'),
                    'minutos_antes_de_finalizar_hervor' => 70
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('6.86'),
                    'minutos_antes_de_finalizar_hervor' => 10
                ]],
                'volumen_en_el_fermentador' => new Volume('26 l'),
                'volumen_total' => new Volume('27.5 l'),
            ],
            'envasado' => [
                'fecha' => Carbon::create(2019, 7, 20),
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
            ],
            'envasado' => [
                'fecha' => Carbon::create(2019, 7, 3),
                'resultado' => [
                    [
                        'envase' => 'botella',
                        'volumen' => 330,
                        'cantidad' => 2
                    ], [
                        'envase' => 'botella',
                        'volumen' => 500,
                        'cantidad' => 43
                    ]
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
                    'momento' => $lupulo['momento'] ?? 10
                ]);
    }
}
