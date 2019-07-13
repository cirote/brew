<?php

use App\Models\Olla;
use Illuminate\Database\Seeder;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;

class OllasTableSeeder extends Seeder
{
    public function run()
    {
        Config::registerDefault('volume', new ConfigVolume());

        Olla::create([
            'nombre' => "Microbrewery system (BM-S400M-1)",
            'volume' => new Volume('40 l'),
            'maximo' => new Volume('30 l'),
            'muerto' => new Volume('3 l')
        ]);
    }
}
