<?php

use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use App\Types\Config\Density as ConfigDensity;
use App\Types\Type\Density;
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Temp as ConfigTemperature;
use JBZoo\SimpleTypes\Type\Temp as Temperature;

class LotesTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('weight', new ConfigWeight());

        Config::registerDefault('volume', new ConfigVolume());

        Config::registerDefault('density', new ConfigDensity());

        Config::registerDefault('temp', new ConfigTemperature());

        $lote = $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 7, 27),
            'receta' => 'Kolsh v0',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Malta tipo pilsen (MOSA)',
                        'cantidad' => new Weight('6 kg'),
                    ]
                ],

                //  Datos al finalizar el macerado, previo a la dilusion de ajuste
                'agua' => [
                    'inicial' => new Volume('22 l'),
                    'lavado' => new Volume('10 l'),
                    'final' => new Volume('25.5 l'),
                ],
                'densidad' => new Density('1.053 sg'),
                'temperatura' => new Temperature('77.7 C'),

                'volumen_post_hervido_calculado' => new Volume('30.7 l'),
                'volumen_post_hervido_olla' => new Volume('31 l'),
                'gravedad_inicial_calculada' => new Density('1.057 sg'),
            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Cascade',
                    'cantidad' => new Weight('30.77 g'),
                    'aa' => 6.4,
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,0),
                ], [
                    'nombre' => 'Hallertauer Mittelfruh',
                    'cantidad' => new Weight('40.07 g'),
                    'aa' => 4.2,
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,29),
                ]],
                'volumen' => new Volume('30 l'),

            ],
            'fermentado' => [
                [
                    'fermentador' => 'Anvil 7.5 gl',
                    'volumen' => new Volume('25 l'),
                    'levadura' => [
                        'nombre' => 'Safbrew S-33',
                        'estado' => 'lavada'
                    ]
                ], [
                    'fermentador' => 'Damajuana',
                    'volumen' => new Volume('5 l'),
                    'levadura' => [
                        'nombre' => 'Safbrew S-33',
                        'estado' => 'lavada'
                    ]
                ]
            ],
            'envasado' => [
                [
                    'fecha' => Carbon::create(2019, 7, 27),
                    'resultado' => [
                        [
                            'envase' => 'mosto',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 2
                        ]
                    ]
                ], [
                    'fecha' => Carbon::create(2019, 7, 26),
                    'resultado' => [
                        [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.330 l'),
                            'cantidad' => 4
                        ], [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 33
                        ], [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.710 l'),
                            'cantidad' => 5
                        ], [
                            'envase' => 'growler',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 5
                        ]
                    ]
                ]
            ]
        ]);

        $lote->macerar()
            ->envasar('2019-7-27', 'b500', 2)
            ->fermentar();

        $lote->macerado->fermentar()
            ->envasar('2019-7-27', 'b710', 10)
            ->envasar('b500', 21)
            ->envasar('g500', 4)
            ->envasar('b330', 13);

        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 7, 21),
            'receta' => 'Cerveza de marzo',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Malta tipo pilsen (MOSA)',
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
                'volumen_vivo' => new Volume('34 l'),
                'volumen_post_hervido_calculado' => new Volume('25.57 l'),
                'gravedad_pre_hervido' => new Density('1.043 sg'),
                'temperatura_medicion' => new Temperature('78.5 C'),
                'gravedad_inicial_calculada' => new Density('1.057 sg'),
            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('7.28 g'),
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,20),
                ], [
                    'nombre' => 'Columbus',
                    'cantidad' => new Weight('14.69'),
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,105),
                ]],
                'volumen_en_el_fermentador' => new Volume('25 l'),
            ],
            'envasado' => [
                [
                    'fecha' => Carbon::create(2019, 7, 21),
                    'resultado' => [
                        [
                            'envase' => 'mosto',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 1
                        ]
                    ]
                ], [
                    'fecha' => Carbon::create(2019, 7, 26),
                    'resultado' => [
                        [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.330 l'),
                            'cantidad' => 4
                        ], [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 33
                        ], [
                            'envase' => 'botella',
                            'volumen' => new Volume('0.710 l'),
                            'cantidad' => 5
                        ], [
                            'envase' => 'growler',
                            'volumen' => new Volume('0.5 l'),
                            'cantidad' => 5
                        ]
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
                        'nombre' => 'Malta tipo pilsen (MOSA)',
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
                    'minutos_antes_de_finalizar_hervor' => CarbonInterval::create(0,0,0,0,0,70),
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('6.86'),
                    'minutos_antes_de_finalizar_hervor' => CarbonInterval::create(0,0,0,0,0,10),
                ]],
                'volumen_en_el_fermentador' => new Volume('26 l'),
                'volumen_total' => new Volume('27.5 l'),
            ],
            'envasado' => [
                'fecha' => Carbon::create(2019, 7, 21),
                'resultado' => [
                    [
                        'envase' => 'botella',
                        'volumen' => new Volume('0.330 l'),
                        'cantidad' => 1
                    ], [
                        'envase' => 'botella',
                        'volumen' => new Volume('0.5 l'),
                        'cantidad' => 25
                    ], [
                        'envase' => 'botella',
                        'volumen' => new Volume('0.6 l'),
                        'cantidad' => 8
                    ], [
                        'envase' => 'botella',
                        'volumen' => new Volume('0.710 l'),
                        'cantidad' => 5
                    ], [
                        'envase' => 'growler',
                        'volumen' => new Volume('4.25 l'),
                        'cantidad' => 1
                    ]
                ]
            ]
        ]);

        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 6, 8),
            'receta' => 'Cerveza de Trigo Belga',
            'macerado' => [
                'maltas' => [[
                    'nombre' => 'Malta tipo pilsen (MOSA)',
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
                        'nombre' => 'Malta tipo pilsen (MOSA)',
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
                    'aa' => $lupulo['aa'] ?? null,
                    'momento' => $lupulo['momento'] ?? 10
                ]);

        return $r;
    }
}
