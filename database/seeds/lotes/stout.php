<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class stout extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Cerveza Belga Stout');

        $receta->cocinar('2019-9-14')
            ->macerar()
                ->malta(Malta::byNombre('Malta Pilsen Cargill'), Scalar::Weight('5.4 kg'))
                    ->malta(Malta::byNombre('Château Cara Gold'), Scalar::Weight('0.42 kg'))
                    ->malta(Malta::byNombre('Château Chocolat'), Scalar::Weight('0.7 kg'))
                    ->malta(Malta::byNombre('Château Black'), Scalar::Weight('0.14 kg'))
                    ->malta(Malta::byNombre('Château Special B'), Scalar::Weight('0.14 kg'))
                ->escalon(Scalar::Temperature('62 °C'), CarbonInterval::minutes(70))
                    ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('21 l'))
                    ->lavado(Scalar::Volume('13.5 l'))
                    ->final(Scalar::Volume('28 l'))
                ->densidad(Scalar::Density('1.052 sg'), Scalar::Temperature('78 C'))
            ->hervir(CarbonInterval::minutes(70))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('25.37 g'), CarbonInterval::minutes(65), 17.3)
                ->lupulo(Lupulo::byNombre('Saaz'), Scalar::Weight('10.6 g'), CarbonInterval::minutes(10))
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('16.56 g'), CarbonInterval::minutes(10), 6.4)
            ->final(Scalar::Volume('26 l'))
//                ->envasar('b330', 1)
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('23 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ],
                'densidad_inicial' => Scalar::Density('1.063 sg')
            ]);
//            ->envasar('2019-8-4', 'b710', 10)
//            ->envasar('b500', 21)
//            ->envasar('g500', 4)
//            ->envasar('b330', 13);

        $receta->cocinar('2019-7-13')
            ->macerar()
                ->malta(Malta::byNombre('Malta tipo pilsen (MOSA)'), Scalar::Weight('5.7 kg'))
                    ->malta(Malta::byNombre('Château Cara Gold'), Scalar::Weight('450 g'))
                    ->malta(Malta::byNombre('Château Chocolat'), Scalar::Weight('740 g'))
                    ->malta(Malta::byNombre('Château Black'), Scalar::Weight('150 g'))
                    ->malta(Malta::byNombre('Château Special B'), Scalar::Weight('90 g'))
                ->escalon(Scalar::Temperature('62 °C'), CarbonInterval::minutes(70))
                    ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('13.5 l'))
                    ->final(Scalar::Volume('31 l'))
                ->densidad(Scalar::Density('1.050 sg'), Scalar::Temperature('78.5 C'))
            ->hervir(CarbonInterval::minutes(70))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('27.73 g'), CarbonInterval::minutes(70))
                ->lupulo(Lupulo::byNombre('Saaz'), Scalar::Weight('6.86 g'), CarbonInterval::minutes(10))
            ->final(Scalar::Volume('27.5 l'))
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('23 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ],
                'densidad_inicial' => Scalar::Density('1.063 sg')
            ]);
//            ->envasar('2019-8-4', 'b710', 10)
//            ->envasar('b500', 21)
//            ->envasar('g500', 4)
//            ->envasar('b330', 13);

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
