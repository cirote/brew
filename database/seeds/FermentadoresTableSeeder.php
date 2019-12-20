<?php

use App\Models\fermentador;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Seeder;

class FermentadoresTableSeeder extends Seeder
{
    public function run()
    {
        fermentador::create([
            'nombre' => 'Anvil 7.5 gl',
            'volume' => Scalar::Volume('7.5 gallon'),
            'maximo' => Scalar::Volume('25 l'),
            'muerto' => Scalar::Volume('1.5 l')
        ]);

        fermentador::create([
            'nombre' => 'Damajuana',
            'volume' => Scalar::Volume('10 l'),
            'maximo' => Scalar::Volume('8 l'),
            'muerto' => Scalar::Volume('0.7 l')
        ]);
    }
}
