<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ipa_ingles extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('IPA Inglesa');

        $receta->cocinar('2021-01-13')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('5.1 kg'))
                    ->malta(Malta::byNombre('Château Melano'), Scalar::Weight('0.130 kg'))
                    ->malta(Malta::byNombre('Château Cara Ruby'), Scalar::Weight('0.130 kg'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('0.130 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
					->escalon(Scalar::Temperature('66 °C'), CarbonInterval::minutes(60))
                    ->mashOut()
                ->agua(Scalar::Volume('21 l'))
                    ->lavado(Scalar::Volume('8 l'))
                    ->final(Scalar::Volume('25 l'))
//				->azucar(Scalar::Weight('0.187 kg'))
                ->densidad(Scalar::Density('1.059 sg'))
//                ->densidad(Scalar::Density('1.056 sg')) Antes del azucar
            ->hervir(CarbonInterval::minutes(75))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('12.02 g'), CarbonInterval::minutes(60), 17.3)
                ->lupulo(Lupulo::byNombre('Perle'), Scalar::Weight('23.51 g'), CarbonInterval::minutes(5), 12.1)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('25.07 g'), CarbonInterval::minutes(5), 6.4)
           ->final(Scalar::Volume('20.0 l'))
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('18.5 l'),
                'levadura' => [
                    'nombre' => 'US 05',
                    'estado' => 'Seca'
                ],
                'densidad_inicial' => Scalar::Density('1.064 sg')
            ])
                ->envasar('2020-11-15', 'b20', 1)
                ->envasar('g2500', 1);
                // 18 litros
    }
}
