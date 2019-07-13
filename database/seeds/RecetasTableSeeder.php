<?php

use App\Models\{Lupulo, Malta, Receta};
use Illuminate\Database\Seeder;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;

class RecetasTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('weight', new ConfigWeight());

        Config::registerDefault('volume', new ConfigVolume());

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

        ]);

        foreach ($receta['maltas'] as $malta)
            $r->maltas()
                ->save(Malta::byNombre($malta['nombre']), ['cantidad' => $malta['cantidad']]);

        foreach ($receta['lupulos'] as $lupulo)
            $r->lupulos()
                ->save(Lupulo::byNombre($lupulo['nombre']), [
                    'uso' => $lupulo['uso'] ?? 'hervido',
                    'cantidad' => $lupulo['cantidad'],
                    'momento' => $lupulo['momento']
                ]);
    }
}
