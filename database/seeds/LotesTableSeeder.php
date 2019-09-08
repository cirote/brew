<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LotesTableSeeder extends Seeder
{
    public function run()
    {
        $hervido = Receta::byNombre('Cerveza de marzo')
            ->cocinar('2019-9-7')
            ->macerar()
                ->malta(Malta::byNombre('Malta Pilsen'), Scalar::Weight('6 kg'))
                    ->malta(Malta::byNombre("Château Cara Ruby"), Scalar::Weight('3.3 kg'))
                    ->malta(Malta::byNombre('Château Biscuit'), Scalar::Weight('0.66 kg'))
                ->escalon(Scalar::Temperature('62 °C'), CarbonInterval::minutes(40))
                    ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(20))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
                    ->lavado(Scalar::Volume('13.5 l'))
                    ->final(Scalar::Volume('26 l'))
                ->densidad(Scalar::Density('1.055 sg'), Scalar::Temperature('78 C'))
            ->hervir(CarbonInterval::minutes(130))
                ->lupulo(Lupulo::byNombre('Saaz'), Scalar::Weight('5.95 g'), CarbonInterval::minutes(19))
                ->lupulo(Lupulo::byNombre('Saaz'), Scalar::Weight('0.92 g'), CarbonInterval::minutes(77))
                ->lupulo(Lupulo::byNombre('Magnum'), Scalar::Weight('13.26 g'), CarbonInterval::minutes(115))
                ->final(Scalar::Volume('23 l'))
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('23 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ],
                'densidad_inicial' => Scalar::Density('1.063 sg')
            ])
                ->envasar('2019-8-4', 'b710', 10)
                ->envasar('b500', 21)
                ->envasar('g500', 4)
                ->envasar('b330', 13);

        $hervido = Receta::byNombre('Kolsh v0')
            ->cocinar('2019-07-27')
            ->macerar()
                ->malta(Malta::byNombre('Malta tipo pilsen (MOSA)'), Scalar::Weight('6 kg'))
                    ->escalon(Scalar::Temperature('122 °F'), CarbonInterval::create(0,0,0,0,0,20))
                    ->escalon(Scalar::Temperature('149 °F'), CarbonInterval::create(0,0,0,0,0,30))
                    ->escalon(Scalar::Temperature('158 °F'), CarbonInterval::create(0,0,0,0,0,30))
                    ->mashOut()
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('10 l'))
                    ->final(Scalar::Volume('25.5 l'))
                    ->densidad(Scalar::Density('1.053 sg'), Scalar::Temperature('77.7 C'))
            ->envasar('2019-7-27', 'b500', 2)
            ->hervir(CarbonInterval::create(0,0,0,0,2,10));

        $hervido->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('25 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ]
            ])
            ->envasar('2019-8-4', 'b710', 10)
            ->envasar('b500', 21)
            ->envasar('g500', 4)
            ->envasar('b330', 13);

        $hervido->fermentar([
                'fermentador' => 'Damajuana',
                'volumen' => Scalar::Volume('5 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ]
            ])
            // Pulpa de frutilla 80 gr 31/7/2019
            // Gelatina 1.2 gr 4/8/2019
            ->envasar('2019-8-8', 'b330', 11);
        // Mugre 700 cc


        $lote = $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 7, 27),
            'receta' => 'Kolsh v0',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Malta tipo pilsen (MOSA)',
                        'cantidad' => Scalar::Weight('6 kg'),
                    ]
                ],

                //  Datos al finalizar el macerado, previo a la dilusion de ajuste
                'agua' => [
                    'inicial' => Scalar::Volume('22 l'),
                    'lavado' => Scalar::Volume('10 l'),
                    'final' => Scalar::Volume('25.5 l'),
                ],
                'densidad' => Scalar::Density('1.053 sg'),
                'temperatura' => Scalar::Temperature('77.7 C'),

                'volumen_post_hervido_calculado' => Scalar::Volume('30.7 l'),
                'volumen_post_hervido_olla' => Scalar::Volume('31 l'),
                'gravedad_inicial_calculada' => Scalar::Density('1.057 sg'),
            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Cascade',
                    'cantidad' => Scalar::Weight('30.77 g'),
                    'aa' => 6.4,
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,0),
                ], [
                    'nombre' => 'Hallertauer Mittelfruh',
                    'cantidad' => Scalar::Weight('40.07 g'),
                    'aa' => 4.2,
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,29),
                ]],
                'volumen' => Scalar::Volume('30 l'),

            ],
        ]);

        $this->agregarLote([
            'brewed_at' => Carbon::create(2019, 7, 21),
            'receta' => 'Cerveza de marzo',
            'macerado' => [
                'maltas' => [
                    [
                        'nombre' => 'Malta tipo pilsen (MOSA)',
                        'cantidad' => Scalar::Weight('3.5 kg'),
                    ], [
                        'nombre' => 'Château Cara Ruby',
                        'cantidad' => Scalar::Weight('2.6 kg'),
                    ], [
                        'nombre' => 'Château Biscuit',
                        'cantidad' => Scalar::Weight('599 g'),
                    ], [
                        'nombre' => 'CaraAmber',
                        'cantidad' => Scalar::Weight('285 g'),
                    ]
                ],
                'volumen_vivo' => Scalar::Volume('34 l'),
                'volumen_post_hervido_calculado' => Scalar::Volume('25.57 l'),
                'gravedad_pre_hervido' => Scalar::Density('1.043 sg'),
                'temperatura_medicion' => Scalar::Temperature('78.5 C'),
                'gravedad_inicial_calculada' => Scalar::Density('1.057 sg'),
            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Saaz',
                    'cantidad' => Scalar::Weight('7.28 g'),
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,20),
                ], [
                    'nombre' => 'Columbus',
                    'cantidad' => Scalar::Weight('14.69'),
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,105),
                ]],
                'volumen_en_el_fermentador' => Scalar::Volume('25 l'),
            ],
            'envasado' => [
                [
                    'fecha' => Carbon::create(2019, 7, 21),
                    'resultado' => [
                        [
                            'envase' => 'mosto',
                            'volumen' => Scalar::Volume('0.5 l'),
                            'cantidad' => 1
                        ]
                    ]
                ], [
                    'fecha' => Carbon::create(2019, 7, 26),
                    'resultado' => [
                        [
                            'envase' => 'botella',
                            'volumen' => Scalar::Volume('0.330 l'),
                            'cantidad' => 4
                        ], [
                            'envase' => 'botella',
                            'volumen' => Scalar::Volume('0.5 l'),
                            'cantidad' => 33
                        ], [
                            'envase' => 'botella',
                            'volumen' => Scalar::Volume('0.710 l'),
                            'cantidad' => 5
                        ], [
                            'envase' => 'growler',
                            'volumen' => Scalar::Volume('0.5 l'),
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
                        'cantidad' => Scalar::Weight('5.7 kg'),
                    ], [
                        'nombre' => 'Château Cara Gold',
                        'cantidad' => Scalar::Weight('450 g'),
                    ], [
                        'nombre' => 'Château Chocolat',
                        'cantidad' => Scalar::Weight('740 g'),
                    ], [
                        'nombre' => 'Château Black',
                        'cantidad' => Scalar::Weight('150 g'),
                    ], [
                        'nombre' => 'Château Special B',
                        'cantidad' => Scalar::Weight('90 g'),
                    ]
                ],
                'volumen_vivo' => Scalar::Volume('31 l'),
                'volumen_total' => Scalar::Volume('34 l'),
                'volumen_post_hervido_calculado' => Scalar::Volume('28.07 l'),
                'gravedad_pre_hervido' => 1.050,
                'temperatura_medicion' => 78.5,
                'gravedad_inicial_calculada' => 1.061

            ],
            'hervido' => [
                'lupulos' => [[
                    'nombre' => 'Columbus',
                    'cantidad' => Scalar::Weight('27.73 g'),
                    'minutos_antes_de_finalizar_hervor' => CarbonInterval::create(0,0,0,0,0,70),
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => Scalar::Weight('6.86'),
                    'minutos_antes_de_finalizar_hervor' => CarbonInterval::create(0,0,0,0,0,10),
                ]],
                'volumen_en_el_fermentador' => Scalar::Volume('26 l'),
                'volumen_total' => Scalar::Volume('27.5 l'),
            ],
            'envasado' => [
                'fecha' => Carbon::create(2019, 7, 21),
                'resultado' => [
                    [
                        'envase' => 'botella',
                        'volumen' => Scalar::Volume('0.330 l'),
                        'cantidad' => 1
                    ], [
                        'envase' => 'botella',
                        'volumen' => Scalar::Volume('0.5 l'),
                        'cantidad' => 25
                    ], [
                        'envase' => 'botella',
                        'volumen' => Scalar::Volume('0.6 l'),
                        'cantidad' => 8
                    ], [
                        'envase' => 'botella',
                        'volumen' => Scalar::Volume('0.710 l'),
                        'cantidad' => 5
                    ], [
                        'envase' => 'growler',
                        'volumen' => Scalar::Volume('4.25 l'),
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
                    'cantidad' => Scalar::Weight('23.6 kg'),
                    'momento' => -75
                ], [
                    'nombre' => 'Styrian Golding',
                    'cantidad' => Scalar::Weight('23.6 lb'),
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
                        'cantidad' => Scalar::Weight('14.88 gr'),
                        'momento' => -60
                    ], [
                        'nombre' => 'Perle',
                        'cantidad' => Scalar::Weight('14.90 gr'),
                        'momento' => -30
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => Scalar::Weight('14.72 gr'),
                        'momento' => -10
                    ], [
                        'nombre' => 'Cascade',
                        'cantidad' => Scalar::Weight('29.48 gr'),
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

//        foreach ($receta['macerado']['maltas'] as $malta)
//            $r->maltas()
//                ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);

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
