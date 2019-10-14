<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;

class RecetasTableSeeder extends Seeder
{
    public function run()
    {
        $this->agregarReceta([
            'nombre' => 'Northern NH Brown',
            'alias' => 'Faltan cargar los datos',
            'link' => 'https://www.brewersfriend.com/homebrew/recipe/view/564492/northern-nh-brown',
            'tamano' => Scalar::Volume('5 gallons'),
            'gravedad_original' => Scalar::Density('1.053 sg'),
            'gravedad_final' => Scalar::Density('1.012 sg'),

            'alcohol' => 4.44,
            'amargor' => 25.08,
            'hervido' =>  CarbonInterval::minutes(60),
            'maltas' => [
                [
                    'nombre' => 'Pilsner',
                    'cantidad' => Scalar::Weight('10 lb'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Liberty',
                    'cantidad' => Scalar::Weight('1 oz'),
                    'aa' => 4,
                    'uso' => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::create(0,0,0,0,0,60)
                ], [
                    'nombre' => 'Hallertauer Hersbrucker',
                    'cantidad' => Scalar::Weight('1 oz'),
                    'aa' => 4,
                    'uso' => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::create(0,0,0,0,0,30)
                ]
            ],
        ]);

        $this->agregarReceta([
		    'nombre' => 'Kolsh v0',
		    'alias' => null,
		    'link' => 'https://www.brewersfriend.com/homebrew/recipe/view/434324/kolsh-v0',
		    'tamano' => Scalar::Volume('6 gallons'),
		    'gravedad_original' => Scalar::Density('1.044 sg'),
		    'gravedad_final' => Scalar::Density('1.010 sg'),
		    'alcohol' => 4.44,
		    'amargor' => 25.08,
		    'hervido' =>  CarbonInterval::create(0,0,0,0,0,60),
		    'maltas' => [
			    [
				    'nombre' => 'Pilsner',
				    'cantidad' => Scalar::Weight('10 lb'),
			    ]
		    ],
		    'lupulos' => [
			    [
				    'nombre' => 'Liberty',
				    'cantidad' => Scalar::Weight('1 oz'),
                    'aa' => 4,
				    'uso' => 'amargor',
				    'minutos_de_hervido' => CarbonInterval::minutes(60)
			    ], [
				    'nombre' => 'Hallertauer Hersbrucker',
				    'cantidad' => Scalar::Weight('1 oz'),
                    'aa' => 4,
				    'uso' => 'amargor',
				    'minutos_de_hervido' => CarbonInterval::create(0,0,0,0,0,30)
			    ]
		    ],
	    ]);

	    $this->agregarReceta([
            'nombre' => 'Sahti',
            'alias' => null,
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=249',
            'tamano' => Scalar::Volume('100 l'),
            'gravedad_original' => Scalar::Density('17 P'),
            'alcohol' => 7.5,
            'amargor' => 13,
            'maltas' => [
                [
                    'nombre' => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('17 kg'),
                ], [
                    'nombre' => 'Château Rye Malt',
                    'cantidad' => Scalar::Weight('4 kg'),
                ], [
                    'nombre' => 'Château Peated',
                    'cantidad' => Scalar::Weight('1 kg'),
                ], [
                    'nombre' => 'Château Cara Blond',
                    'cantidad' => Scalar::Weight('1 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Brewers Gold',
                    'cantidad' => Scalar::Weight('110 g'),
                    'uso' => 'amargor',
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,5)
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Cerveza de marzo',
            'alias' => 'Cerveza de primavera',
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=273',
            'tamano' => Scalar::Volume('100 l'),
            'gravedad_original' => Scalar::Density('14 P'),
            'alcohol' => [
                'max' => 6,
                'min' => 5.5
            ],
            'amargor' => [
                'max' => 15,
                'min' => 20
            ],
            'maltas' => [
                [
                    'nombre' => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('12 kg'),
                ], [
                    'nombre' => 'Château Cara Ruby',
                    'cantidad' => Scalar::Weight('10 kg'),
                ], [
                    'nombre' => 'Château Biscuit',
                    'cantidad' => Scalar::Weight('2 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Saaz',
                    'cantidad' => Scalar::Weight('25 g'),
                    'uso' => 'amargor',
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,15)
                ], [
                    'nombre' => 'Magnum',
                    'cantidad' => Scalar::Weight('50 g'),
                    'uso' => 'aroma',
                    'minutos_despues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,105)
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Cerveza Belga Stout',
            'alias' => 'Lucaku',
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=265',
            'tamano' => Scalar::Volume('100 l'),
            'gravedad_original' => Scalar::Density('15 P'),
            'maltas' => [
                [
                    'nombre' => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('19.2 kg'),
                ], [
                    'nombre' => 'Château Cara Gold',
                    'cantidad' => Scalar::Weight('1.5 kg'),
                ], [
                    'nombre' => 'Château Chocolat',
                    'cantidad' => Scalar::Weight('2.5 kg'),
                ], [
                    'nombre' => 'Château Black',
                    'cantidad' => Scalar::Weight('0.5 kg'),
                ], [
                    'nombre' => 'Château Special B',
                    'cantidad' => Scalar::Weight('0.3 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Saaz',
                    'cantidad' => Scalar::Weight('420 g'),
                    'uso' => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(70)
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => Scalar::Weight('100 g'),
                    'uso' => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(10)
                ]
            ],
        ])
            ->escalon(Scalar::Temperature('62 °C'), CarbonInterval::minutes(70))
            ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(10))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(70));

        $this->agregarReceta([
            'nombre' => 'Cerveza de Trigo Belga',
            'tamano' =>  Scalar::Volume('100 l'),
            'maltas' => [[
                'nombre' => 'Château Pilsen 2RS',
                'cantidad' => 19
            ], [
                'nombre' => 'Château Wheat Blanc',
                'cantidad' => 5
            ]],
            'lupulos' => [[
                'nombre' => 'Magnum',
                'cantidad' => 80,
                'momento' => 15
            ], [
                'nombre' => 'Styrian Golding',
                'cantidad' => 80,
                'momento' => 85
            ]],
        ]);

        $this->agregarReceta([
            'nombre' => 'Sierra Nevada',
            'tamano' =>  Scalar::Volume('100 l'),
            'maltas' => [[
                'nombre' => 'Pale 2-Row',
                'cantidad' => 11.5,
                'unidad' => 'lb'
            ], [
                'nombre' => 'Castle Crystal',
                'cantidad' => 14.54,
                'unidad' => 'oz'
            ]],
            'lupulos' => [[
                'nombre' => 'Magnum',
                'cantidad' => 0.5,
                'unidad' => 'oz',
                'momento' => 60,
                'unidad' => 'minutos'
            ], [
                'nombre' => 'Perle',
                'cantidad' => 0.5,
                'unidad' => 'oz',
                'momento' => 30,
                'unidad' => 'minutos'
            ], [
                'nombre' => 'Cascade',
                'cantidad' => 1,
                'unidad' => 'oz',
                'momento' => 10,
                'unidad' => 'minutos'
            ], [
                'nombre' => 'Cascade',
                'cantidad' => 2,
                'unidad' => 'oz',
                'momento' => 0,
                'unidad' => 'minutos'
            ], [
                'nombre' => 'Cascade',
                'cantidad' => 4,
                'unidad' => 'oz',
                'momento' => 4,
                'unidad' => 'dias'
            ]],
        ]);
    }

    private function agregarReceta($receta)
    {
        $r = Receta::create([
            'nombre' => $receta['nombre'],
            'alias' => $receta['alias'] ?? null,
            'link' => $receta['link'] ?? null,
            'tamano' => $receta['tamano'],
            'gravedad_original' => $receta['gravedad_original'] ?? 0
        ]);

        foreach ($receta['maltas'] as $malta)
            $r->maltas()
                ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);

        foreach ($receta['lupulos'] as $lupulo)
            $r->lupulos()
                ->save(Lupulo::byNombre($lupulo['nombre']), [
                    'uso' => $lupulo['uso'] ?? 'hervido',
                    'cantidad' => $lupulo['cantidad'],
                    'aa' => $lupulo['aa'] ?? null,
                    'tiempo_de_hervido' => $this->tiempoDeHervido($lupulo)
                ]);

        return $r;
    }

    private function tiempoDeHervido($lupulo)
    {
    	if (isset($lupulo['minutos_de_hervido']))
    		return $lupulo['minutos_de_hervido'];

	    if (isset($lupulo['minutos_despues_de_iniciar_el_hervor']))
		    return $lupulo['minutos_despues_de_iniciar_el_hervor'];

	    return '';
    }
}
