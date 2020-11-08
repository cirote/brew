<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class cerveza_de_marzo extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Cerveza de marzo');

        $receta->cocinar('2020-11-08')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('2.76 kg'))
                    ->malta(Malta::byNombre('Château Cara Ruby'), Scalar::Weight('2.3 kg'))
                    ->malta(Malta::byNombre('Château Biscuit'), Scalar::Weight('0.46 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(40))
                    ->alphaRest(CarbonInterval::minutes(20))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
                    ->lavado(Scalar::Volume('11 l'))
                    ->final(Scalar::Volume('26 l'))
                ->densidad(Scalar::Density('1.046 sg'))
            ->hervir(CarbonInterval::minutes(130))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('21.67 g'), CarbonInterval::minutes(70), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('23.64 g'), CarbonInterval::minutes(10), 6.4)
            ->final(Scalar::Volume('20 l'))
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('19.5 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-5',
                    'estado' => 'Seca'
                ],
                'densidad_inicial' => Scalar::Density('1.061 sg')
            ])
                ->envasar('2020-5-21', 'b20', 1);

    }
}
