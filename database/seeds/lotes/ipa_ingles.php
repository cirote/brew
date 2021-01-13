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
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('8 l'))
                    ->final(Scalar::Volume('26 l'))
                ->densidad(Scalar::Density('1.069 sg'))
            ->hervir(CarbonInterval::minutes(60))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('12.79 g'), CarbonInterval::minutes(114), 17.3)
                ->lupulo(Lupulo::byNombre('Perle'), Scalar::Weight('12.42 g'), CarbonInterval::minutes(25), 12.1)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('13.03 g'), CarbonInterval::minutes(25), 6.4)
                ->lupulo(Lupulo::byNombre('Hallertauer Mittelfruh'), Scalar::Weight('10.25 g'), CarbonInterval::minutes(25), 12.1)
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
                ->envasar('2020-11-15', 'b20', 1)
                ->envasar('g2500', 1);
                // 18 litros
    }
}
