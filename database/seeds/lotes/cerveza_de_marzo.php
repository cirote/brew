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

        $receta->cocinar('2022-05-15')
            ->macerar()
                ->malta(Malta::byNombre('Pilsen UMA'), Scalar::Weight('3960 g'))
                    ->malta(Malta::byNombre('Château Cara Ruby'), Scalar::Weight('3300 g'))
                    ->malta(Malta::byNombre('Château Biscuit'), Scalar::Weight('660 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(50))
                    ->alphaRest(CarbonInterval::minutes(30))
                    ->mashOut()
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('12 l'))
                    ->final(Scalar::Volume('28 l'), Scalar::Density('1.053 sg'))
            ->hervir(CarbonInterval::minutes(130))   // 30 litros
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('26.02 g'), CarbonInterval::minutes(115), 4.0)   // AA ajustados por edad
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('9.76 g'), CarbonInterval::minutes(15), 4)
                //  ->ibus(15.2)
				->final(Scalar::Volume('25 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('W-34/70', 'Lavada')
				->inicio(Scalar::Volume('25 l'), Scalar::Density('1.054 sg'))
				->final(Scalar::Density('1.003 sg'))    // Ya corregida, la del refractometro fue 1.020
            ->envasar('2022-05-01', 'b20', 1, Scalar::Volume('18 l'))
                ->envasar('g500', 11)
                ->envasar('b500', 9);
			// ->opinion('Emilia', 9, 'Suave, fresca y agradable de tomar')
			// ->opinion('Miguel', 8, 'Bastante cuerpo. Buena espuma. Amargo ok y con sabor lupulado');

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
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('8 l'))
                    ->final(Scalar::Volume('22.7 l'))
                ->densidad(Scalar::Density('1.049 sg'))
            ->hervir(CarbonInterval::minutes(130))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('2.17 g'), CarbonInterval::minutes(114), 17.3)
                ->lupulo(Lupulo::byNombre('Magnum'), Scalar::Weight('1.63 g'), CarbonInterval::minutes(25), 12.1)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('10.03 g'), CarbonInterval::minutes(25), 6.4)
            ->final(Scalar::Volume('19.0 l'))
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('18.5 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'Seca'
                ],
                'densidad_inicial' => Scalar::Density('1.059 sg')
            ])
                ->envasar('2020-11-15', 'b20', 1);
                // 18 litros
    }
}
