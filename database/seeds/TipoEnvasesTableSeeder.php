<?php

use Illuminate\Database\Seeder;
use App\Models\TipoEnvase;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use JBZoo\SimpleTypes\Type\Volume;

class TipoEnvasesTableSeeder extends Seeder
{
    public function run()
    {

        Config::registerDefault('volume', new ConfigVolume());

        TipoEnvase::create([
            'abreviatura' => 'b330',
            'nombre' => 'botella',
            'capacidad' => new Volume('0.33 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b500',
            'nombre' => 'botella',
            'capacidad' => new Volume('0.5 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b710',
            'nombre' => 'botella',
            'capacidad' => new Volume('0.71 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'g500',
            'nombre' => 'growler',
            'capacidad' => new Volume('0.5 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'g4200',
            'nombre' => 'growler',
            'capacidad' => new Volume('4.2 l')
        ]);
    }
}
