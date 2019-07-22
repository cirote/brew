<?php

use App\Models\{Lupulo, Malta, Receta};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use App\Types\Type\Density;
use App\Types\Config\Density as ConfigDensity;

class RecetasTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('weight', new ConfigWeight());

        Config::registerDefault('volume', new ConfigVolume());

        Config::registerDefault('Density', new ConfigDensity());

        $this->agregarReceta([
            'nombre' => 'Sahti',
            'alias' => '',
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=249',
            'tamano' => new Volume('100 l'),
            'gravedad_original' => new Density('17 P'),
            'alcohol' => 7.5,
            'amargor' => 13,
            'maltas' => [
                [
                    'nombre' => 'Château Pilsen 2RS',
                    'cantidad' => new Weight('17 kg'),
                ], [
                    'nombre' => 'Château Rye Malt',
                    'cantidad' => new Weight('4 kg'),
                ], [
                    'nombre' => 'Château Peated',
                    'cantidad' => new Weight('1 kg'),
                ], [
                    'nombre' => 'Château Cara Blond',
                    'cantidad' => new Weight('1 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Brewers Gold',
                    'cantidad' => new Weight('110 g'),
                    'uso' => 'amargor',
                    'minutos_desdpues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,5)
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Cerveza de marzo',
            'alias' => 'Cerveza de primavera',
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=273',
            'tamano' => new Volume('100 l'),
            'gravedad_original' => new Density('14 P'),
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
                    'cantidad' => new Weight('12 kg'),
                ], [
                    'nombre' => 'Château Cara Ruby',
                    'cantidad' => new Weight('10 kg'),
                ], [
                    'nombre' => 'Château Biscuit',
                    'cantidad' => new Weight('2 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('25 g'),
                    'uso' => 'amargor',
                    'minutos_desdpues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,15)
                ], [
                    'nombre' => 'Magnum',
                    'cantidad' => new Weight('50 g'),
                    'uso' => 'aroma',
                    'minutos_desdpues_de_iniciar_el_hervor' => CarbonInterval::create(0,0,0,0,0,105)
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Cerveza Belga Stout',
            'alias' => 'Lucaku',
            'link' => 'https://www.castlemalting.com/CastleMaltingBeerRecipes.asp?Command=RecipeViewHtml&RecipeID=265',
            'tamano' => new Volume('100 l'),
            'gravedad_original' => 1.061,
            'maltas' => [
                [
                    'nombre' => 'Château Pilsen 2RS',
                    'cantidad' => new Weight('19.2 kg'),
                ], [
                    'nombre' => 'Château Cara Gold',
                    'cantidad' => new Weight('1.5 kg'),
                ], [
                    'nombre' => 'Château Chocolat',
                    'cantidad' => new Weight('2.5 kg'),
                ], [
                    'nombre' => 'Château Black',
                    'cantidad' => new Weight('0.5 kg'),
                ], [
                    'nombre' => 'Château Special B',
                    'cantidad' => new Weight('0.3 kg'),
                ]
            ],
            'lupulos' => [
                [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('420 g'),
                    'uso' => 'amargor',
                    'momento' => 0
                ], [
                    'nombre' => 'Saaz',
                    'cantidad' => new Weight('100 g'),
                    'uso' => 'aroma',
                    'momento' => 10
                ]
            ],
        ]);

        $this->agregarReceta([
            'nombre' => 'Cerveza de Trigo Belga',
            'tamano' =>  new Volume('100 l'),
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
            'tamano' =>  new Volume('100 l'),
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
                    'momento' => $lupulo['momento'] ?? $lupulo['minutos_desdpues_de_iniciar_el_hervor']
                ]);
    }
}
