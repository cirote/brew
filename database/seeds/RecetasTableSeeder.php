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
            'nombre' => 'Negra Dulce (Almacen Cervecero)',
            'alias'  => '',
            'link'   => '',
            'tamano' => Scalar::Volume('30 litres'),
            'gravedad_original' => Scalar::Density('1.054 sg'),
            'maltas' => [
                [
                    'nombre'   => 'Pilsen UMA',
                    'cantidad' => Scalar::Weight('5.25 kg'),
                ], [
                    'nombre'   => 'Vienna UMA',
                    'cantidad' => Scalar::Weight('0.6 kg'),
                ], [
                    'nombre' => 'Château Chocolat',
                    'cantidad' => Scalar::Weight('0.75 kg'),
                ], [
                    'nombre' => 'Château Cafe Light',
                    'cantidad' => Scalar::Weight('0.15 kg'),
                ], [
                    'nombre' => 'Château Special B',
                    'cantidad' => Scalar::Weight('0.075 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre'    => 'Magnum',
                    'cantidad'  => Scalar::Weight('45 g'),
                    'aa'        => 12,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(90)
                ]
            ],
        ])
            ->betaRest(CarbonInterval::minutes(55))
            ->alphaRest(CarbonInterval::minutes(35))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(90));

        $this->agregarReceta([
            'nombre' => 'Harp Irish Lager Clone',
            'alias'  => '',
            'link'   => 'https://www.brewersfriend.com/homebrew/recipe/view/209607/harp-irish-lager-clone',
            'tamano' => Scalar::Volume('48 litres'),
            'gravedad_original' => Scalar::Density('1.049 sg'),
            'maltas' => [
                [
                    'nombre'   => 'Pilsen UMA',
                    'cantidad' => Scalar::Weight('8.8 kg'),
                ], [
                    'nombre'   => 'CaraHell',
                    'cantidad' => Scalar::Weight('0.5 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre'    => 'Hallertauer Hersbrucker',
                    'cantidad'  => Scalar::Weight('65 g'),
                    'aa'        => 4,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(90)
                ], [
                    'nombre'    => 'Hallertauer Hersbrucker',
                    'cantidad'  => Scalar::Weight('35 g'),
                    'aa'        => 4,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(15)
                ], [
                    'nombre'    => 'Saaz',
                    'cantidad'  => Scalar::Weight('35 g'),
                    'aa'        => 20.5,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(15)
                ], [
                    'nombre'    => 'Hallertauer Hersbrucker',
                    'cantidad'  => Scalar::Weight('15 g'),
                    'aa'        => 4,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(5)
                ], [
                    'nombre'    => 'Saaz',
                    'cantidad'  => Scalar::Weight('15 g'),
                    'aa'        => 20.5,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(5)
                ]
            ],
        ])
            ->betaRest(CarbonInterval::minutes(45))
            ->alphaRest(CarbonInterval::minutes(45))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(90));

        $this->agregarReceta([
            'nombre' => 'Del Faraon',
            'alias'  => '',
            'link'   => '',
            'tamano' => Scalar::Volume('100 litres'),
            'gravedad_original' => Scalar::Density('13 P'),
            'maltas' => [
                [
                    'nombre'   => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('9 kg'),
                ], [
                    'nombre'   => 'Château Cara Gold',
                    'cantidad' => Scalar::Weight('4.2 kg'),
                ], [
                    'nombre'   => 'Château Wheat Blanc',
                    'cantidad' => Scalar::Weight('3.6 kg'),
                ], [
                    'nombre'   => 'Château Oat',
                    'cantidad' => Scalar::Weight('0.9 kg'),
                ], [
                    'nombre'   => 'Château Cara Ruby',
                    'cantidad' => Scalar::Weight('0.2 kg'),
                ], [
                    'nombre' => 'Château Black',
                    'cantidad' => Scalar::Weight('0.2 kg'),
                ], [
                    'nombre' => 'Château Chocolat Light',
                    'cantidad' => Scalar::Weight('0.2 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre'    => 'Saaz',
                    'cantidad'  => Scalar::Weight('100 g'),
                    'aa'        => 20.5,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(55)
                ], [
                    'nombre'    => 'Northern Brewer',
                    'cantidad'  => Scalar::Weight('50 g'),
                    'aa'        => 6.5,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(0)
                ]
            ],
        ])
            ->betaRest(CarbonInterval::minutes(45))
            ->alphaRest(CarbonInterval::minutes(20))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(90));

        $this->agregarReceta([
            'nombre' => 'Triple Blond',
            'alias'  => '',
            'link'   => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=276',
            'tamano' => Scalar::Volume('100 litres'),
            'gravedad_original' => Scalar::Density('19 P'),
            'maltas' => [
                [
                    'nombre'   => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('19.5 kg'),
                ], [
                    'nombre'   => 'Château Cara Blond',
                    'cantidad' => Scalar::Weight('2.3 kg'),
                ], [
                    'nombre'   => 'Château Cara Clair',
                    'cantidad' => Scalar::Weight('1 kg'),
                ], [
                    'nombre'   => 'Château Wheat Blanc',
                    'cantidad' => Scalar::Weight('1 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre'    => 'Polaris',
                    'cantidad'  => Scalar::Weight('42 g'),
                    'aa'        => 20.5,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(55)
                ], [
                    'nombre'    => 'Perle',
                    'cantidad'  => Scalar::Weight('50 g'),
                    'aa'        => 6.5,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(0)
                ], [
                    'nombre'    => 'Cascade',
                    'cantidad'  => Scalar::Weight('50 g'),
                    'aa'        => 6.4,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(0)
                ], [
                    'nombre'    => 'Mosaic',
                    'cantidad'  => Scalar::Weight('50 g'),
                    'aa'        => 12.5,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(0)
                ]
            ],
        ])
            ->betaRest(CarbonInterval::minutes(45))
            ->alphaRest(CarbonInterval::minutes(10))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(60));

        $this->agregarReceta([
            'nombre' => 'IPA Inglesa',
            'alias'  => '',
            'link'   => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=307',
            'tamano' => Scalar::Volume('100 litres'),
            'gravedad_original' => Scalar::Density('16.5 P'),
            'maltas' => [
                [
                    'nombre'   => 'Château Pilsen 2RS',
                    'cantidad' => Scalar::Weight('19.5 kg'),
                ], [
                    'nombre'   => 'Château Melano Light',
                    'cantidad' => Scalar::Weight('0.5 kg'),
                ], [
                    'nombre'   => 'Château Cara Ruby',
                    'cantidad' => Scalar::Weight('0.5 kg'),
                ], [
                    'nombre'   => 'Château Cara Blond',
                    'cantidad' => Scalar::Weight('0.5 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre'    => 'Goldings',
                    'cantidad'  => Scalar::Weight('210 g'),
                    'aa'        => 4.1,
                    'uso'       => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(60)
                ], [
                    'nombre'    => 'Fuggle',
                    'cantidad'  => Scalar::Weight('100 g'),
                    'aa'        => 4.2,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(5)
                ], [
                    'nombre'    => 'Aramis',
                    'cantidad'  => Scalar::Weight('100 g'),
                    'aa'        => 8.1,
                    'uso'       => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(5)
                ]
            ],
        ])
            ->escalon(Scalar::Temperature('66 °C'), CarbonInterval::minutes(60))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(75));

	    $this->agregarReceta([
		    'nombre' => 'Pilsener czech',
		    'alias'  => 'Bohemian Pilsener',
		    'link'   => 'https://www.brewersfriend.com/homebrew/recipe/view/843056/pilsener-czech#a_aid=5c74134683a37',
		    'tamano' => Scalar::Volume('26.5 litres'),
		    'gravedad_original' => Scalar::Density('1.053 sg'),
		    'maltas' => [
			    [
				    'nombre'   => 'German Pilsner',
				    'cantidad' => Scalar::Weight('5.2 kg'),
			    ], [
				    'nombre'   => 'American Carapils',
				    'cantidad' => Scalar::Weight('0.2 kg'),
			    ]
		    ],
		    'lupulos' => [
			    [
				    'nombre'    => 'Saaz',
				    'cantidad'  => Scalar::Weight('48.1 g'),
				    'aa'        => 3.5,
				    'uso'       => 'amargor',
				    'minutos_de_hervido' => CarbonInterval::minutes(90)
			    ], [
				    'nombre'    => 'Saaz',
				    'cantidad'  => Scalar::Weight('65 g'),
				    'aa'        => 3.5,
				    'uso'       => 'sabor',
				    'minutos_de_hervido' => CarbonInterval::minutes(20)
			    ], [
				    'nombre'    => 'Saaz',
				    'cantidad'  => Scalar::Weight('32.5 g'),
				    'aa'        => 3.5,
				    'uso'       => 'aroma',
				    'minutos_de_hervido' => CarbonInterval::minutes(10)
			    ], [
				    'nombre'    => 'Saaz',
				    'cantidad'  => Scalar::Weight('32.5 g'),
				    'aa'        => 3.5,
				    'uso'       => 'aroma',
				    'minutos_de_hervido' => CarbonInterval::minutes(0)
			    ]
		    ],
	    ])
		    ->proteinRest(CarbonInterval::minutes(15))
		    ->betaRest(CarbonInterval::minutes(30))
		    ->alphaRest(CarbonInterval::minutes(30))
		    ->mashOut()
		    ->hervido(CarbonInterval::minutes(90));

	    $this->agregarReceta([
		    'nombre' => 'Cerveza Lager',
		    'alias'  => 'Lager de Castlemalting',
		    'link'   => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=286&Language=Spanish',
		    'tamano' => Scalar::Volume('100 litres'),
		    'gravedad_original' => Scalar::Density('11 P'),
		    'maltas' => [
			    [
				    'nombre'   => 'Château Pilsen 2RS',
				    'cantidad' => Scalar::Weight('14 kg'),
			    ], [
				    'nombre'   => 'Château Cara Clair',
				    'cantidad' => Scalar::Weight('2 kg'),
			    ], [
				    'nombre'   => 'Corn',
				    'cantidad' => Scalar::Weight('4 kg'),
			    ]
		    ],
		    'lupulos' => [
			    [
				    'nombre'    => 'Polaris',
				    'cantidad'  => Scalar::Weight('25 g'),
				    'aa'        => 20.5,
				    'uso'       => 'amargor',
				    'minutos_de_hervido' => CarbonInterval::minutes(45)
			    ], [
				    'nombre'    => 'Perle',
				    'cantidad'  => Scalar::Weight('100 g'),
				    'aa'        => 4,
				    'uso'       => 'amargor',
				    'minutos_de_hervido' => CarbonInterval::minutes(45)
			    ], [
				    'nombre'    => 'Aramis',
				    'cantidad'  => Scalar::Weight('100 g'),
				    'aa'        => 4,
				    'uso'       => 'aroma',
				    'minutos_de_hervido' => CarbonInterval::minutes(5)
			    ], [
				    'nombre'    => 'Saaz',
				    'cantidad'  => Scalar::Weight('80 g'),
				    'aa'        => 3.5,
				    'uso'       => 'aroma',
				    'minutos_de_hervido' => CarbonInterval::minutes(5)
			    ]
		    ],
	    ])
		    ->escalon(Scalar::Temperature('63 °C'), CarbonInterval::minutes(50))
		    ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(10))
		    ->mashOut()
		    ->hervido(CarbonInterval::minutes(60));

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
                    'nombre' => 'German Pilsner',
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
				    'nombre' => 'German Pilsner',
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
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=278',
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
                    'minutos_de_hervido' => CarbonInterval::minutes(75)
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
        ])
            ->betaRest(CarbonInterval::minutes(40))
            ->alphaRest(CarbonInterval::minutes(20))
            ->mashOut()
            ->hervido(CarbonInterval::minutes(130));

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
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=12',
            'tamano' => Scalar::Volume('100 l'),
            'gravedad_original' => Scalar::Density('11.5 P'),
            'maltas' => [[
                'nombre' => 'Château Pilsen 2RS',
                'cantidad' => 19
            ], [
                'nombre' => 'Château Wheat Blanc',
                'cantidad' => 5
            ]],
            'lupulos' => [
                [
                    'nombre' => 'Magnum',
                    'cantidad' => Scalar::Weight('70 g'),
                    'uso' => 'amargor',
                    'minutos_de_hervido' => CarbonInterval::minutes(60)
                ], [
                    'nombre' => 'Styrian Golding',
                    'cantidad' => Scalar::Weight('70 g'),
                    'uso' => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(10)
                ], [
                    'nombre' => 'Citra',
                    'cantidad' => Scalar::Weight('70 g'),
                    'uso' => 'aroma',
                    'minutos_de_hervido' => CarbonInterval::minutes(5)
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Sierra Nevada',
            'tamano' =>  Scalar::Volume('100 l'),
            'maltas' => [[
                'nombre' => 'American Pale 2-Row',
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

        if (!$r)
        {
            dd($receta);
        }

        foreach ($receta['maltas'] as $malta)
        {
	        $r->maltas()
		        ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);
        }

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
