<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class trigo extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Cerveza de Trigo Belga');

        $receta->cocinar('2020-7-19')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('4.37 kg'))
                    ->malta(Malta::byNombre('Château Wheat Blanc'), Scalar::Weight('1.15 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(60))
                    ->alphaRest(CarbonInterval::minutes(20))
                    ->mashOut()
                ->agua(Scalar::Volume('18 l'))
                    ->lavado(Scalar::Volume('5 l')) 
                    ->final(Scalar::Volume('20 l'))
                ->densidad(Scalar::Density('1.054 sg'))
            ->hervir(CarbonInterval::minutes(90))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('17.47 g'), CarbonInterval::minutes(75), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('20.27 g'), CarbonInterval::minutes(5), 17.3)
//                ->adjunto(Adjunto::byNombre('Cascara de naranja dulce'), Scalar::Weight('40.14 g'), CarbonInterval::minutes(5))
//                ->densidad(Scalar::Density('1.068 sg'))
            ->final(Scalar::Volume('20 l'))
//                ->envasar('b330', 1)
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('18 l'),
                'levadura' => [
                    'nombre' => 'Safbrew US-5',
                    'estado' => 'Seca'
                ],
                'densidad_inicial' => Scalar::Density('1.084 sg')
            ]);
//            ->envasar('2019-8-4', 'b710', 10)
//            ->envasar('b500', 21)
//            ->envasar('g500', 4)
//            ->envasar('b330', 13);

    }
}
