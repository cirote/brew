<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class sahti extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Sahti');

        $receta->cocinar('2020-3-1')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('4.760 kg'))
                    ->malta(Malta::byNombre('Château Rye Malt'), Scalar::Weight('1.12 kg'))
                    ->malta(Malta::byNombre('Château Peated'), Scalar::Weight('0.28 kg'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('0.28 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(60))
                    ->alphaRest(CarbonInterval::minutes(15))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
                    ->lavado(Scalar::Volume('9 l')) 
                    ->final(Scalar::Volume('25 l'))
                ->densidad(Scalar::Density('1.053 sg'))
            ->hervir(CarbonInterval::minutes(80))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('7.81 g'), CarbonInterval::minutes(75), 17.3)
//                ->adjunto(Adjunto::byNombre('Enebro'), Scalar::Weight('10 g'), CarbonInterval::minutes(5))
//                ->densidad(Scalar::Density('1.068 sg'))
            ->final(Scalar::Volume('22 l'))
//                ->envasar('b330', 1)
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('16 l'),
                'levadura' => [
                    'nombre' => 'W-34/70',
                    'estado' => 'seca'
                ],
                'densidad_inicial' => Scalar::Density('1.084 sg')
            ]);
//            ->envasar('2019-8-4', 'b710', 10)
//            ->envasar('b500', 21)
//            ->envasar('g500', 4)
//            ->envasar('b330', 13);

    }
}
