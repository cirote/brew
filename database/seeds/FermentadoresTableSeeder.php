<?php

use App\Models\fermentador;
use Illuminate\Database\Seeder;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use JBZoo\SimpleTypes\Type\Volume;

class FermentadoresTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('volume', new ConfigVolume());

        fermentador::create([
            'nombre' => 'Anvil 7.5 gl',
            'volume' => new Volume('7.5 gallon'),
            'maximo' => new Volume('25 l'),
            'muerto' => new Volume('1.5 l')
        ]);

        fermentador::create([
            'nombre' => 'Damajuana',
            'volume' => new Volume('10 l'),
            'maximo' => new Volume('8 l'),
            'muerto' => new Volume('1.5 l')
        ]);
    }
}
