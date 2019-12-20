<?php

use App\Models\Olla;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Seeder;

class OllasTableSeeder extends Seeder
{
    public function run()
    {
        Olla::create([
            'nombre' => "Microbrewery system (BM-S400M-1)",
            'volume' => Scalar::Volume('40 l'),
            'maximo' => Scalar::Volume('30 l'),
            'muerto' => Scalar::Volume('3 l')
        ]);
    }
}
