<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class pilsener_czech extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Pilsener czech');

        $receta->cocinar('2020-2-9')
            ->macerar()
                ->malta(Malta::byNombre('German Pilsner'), Scalar::Weight('5.4 kg'))
                    ->malta(Malta::byNombre('American Carapils'), Scalar::Weight('0.2 kg'))
                ->proteinRest(CarbonInterval::minutes(15))
                    ->betaRest(CarbonInterval::minutes(30))
                    ->alphaRest(CarbonInterval::minutes(30))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
                    ->lavado(Scalar::Volume('10 l'))
                    ->final(Scalar::Volume('26 l'))
                ->densidad(Scalar::Density('1.046 sg'), Scalar::Temperature('78 C'))
            ->hervir(CarbonInterval::minutes(90))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('10.89 g'), CarbonInterval::minutes(90), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('60.29 g'), CarbonInterval::minutes(20), 6.4)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('50.45 g'), CarbonInterval::minutes(5), 6.4)
//                ->densidad(Scalar::Density('1.055 sg'))
            ->final(Scalar::Volume('22 l'))
//                ->envasar('b330', 1)
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('21 l'),
                'levadura' => [
                    'nombre' => 'W-34/70',
                    'estado' => 'seca'
                ],
                'densidad_inicial' => Scalar::Density('1.057 sg'),
                'densidad_final' => Scalar::Density('1.026 sg')
            ]);
//            ->envasar('2020-2-29', 'barril19', 1);

    }
}
