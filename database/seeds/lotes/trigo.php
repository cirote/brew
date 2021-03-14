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

        $receta->cocinar('2021-03-14')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('4.37 kg'))
                    ->malta(Malta::byNombre('Château Wheat Blanc'), Scalar::Weight('1.15 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
					->escalon(Scalar::Temperature('60 °C'), CarbonInterval::minutes(45))	// Le agregé 5 minutos por que se enfrio cuando prendí el recirculado
					->escalon(Scalar::Temperature('68 °C'), CarbonInterval::minutes(15))
					->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(20))
					->escalon(Scalar::Temperature('78 °C'), CarbonInterval::minutes(10))
                ->agua(Scalar::Volume('21 l'))
					->densidadAntesDeLavar(Scalar::Density('1.067 sg'))
                    ->lavado(Scalar::Volume('11 l'))
                    ->final(Scalar::Volume('27.3 l'))
                ->densidad(Scalar::Density('1.056 sg'))
            ->hervir(CarbonInterval::minutes(90), Scalar::Volume('8 gallons'))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('10.63 g'), CarbonInterval::minutes(58), 17.3)
                ->lupulo(Lupulo::byNombre('Hallertauer'), Scalar::Weight('22.47 g'), CarbonInterval::minutes(10), 6.4)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('17.75 g'), CarbonInterval::minutes(5), 6.4)
				->final(Scalar::Volume('17.5 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('S-04', 'Lavada')
				->inicio(Scalar::Volume('25.3 l'), Scalar::Density('1.060 sg'))
				->final(Scalar::Density('1.030 sg'))
            ->envasar('2021-03-27', 'b20', 1, Scalar::Volume('17 l'));

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
