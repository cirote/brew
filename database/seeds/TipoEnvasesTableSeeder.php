<?php

use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Seeder;
use App\Models\TipoEnvase;

class TipoEnvasesTableSeeder extends Seeder
{
    public function run()
    {
        TipoEnvase::create([
            'abreviatura' => 'b330',
            'nombre' => 'botella',
            'capacidad' => Scalar::Volume('0.33 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b500',
            'nombre' => 'botella',
            'capacidad' => Scalar::Volume('0.5 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b600',
            'nombre' => 'botella',
            'capacidad' => Scalar::Volume('0.6 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b710',
            'nombre' => 'botella',
            'capacidad' => Scalar::Volume('0.71 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'g500',
            'nombre' => 'growler',
            'capacidad' => Scalar::Volume('0.5 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'g4200',
            'nombre' => 'growler',
            'capacidad' => Scalar::Volume('4.2 l')
        ]);

        TipoEnvase::create([
            'abreviatura' => 'b20',
            'nombre' => 'barril',
            'capacidad' => Scalar::Volume('19.5 l')
        ]);
    }
}
