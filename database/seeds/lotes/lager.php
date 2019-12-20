<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class lager extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Cerveza Lager');

        $receta->cocinar('2019-9-14')
            ->macerar()
                ->malta(Malta::byNombre('Malta Pilsen Cargill'), Scalar::Weight('5.4 kg'))
                    ->malta(Malta::byNombre('Château Cara Clair'), Scalar::Weight('0.42 kg'))
                    ->malta(Malta::byNombre('Corn'), Scalar::Weight('0.7 kg'))
                ->escalon(Scalar::Temperature('62 °C'), CarbonInterval::minutes(70))
                    ->escalon(Scalar::Temperature('72 °C'), CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
                    ->lavado(Scalar::Volume('7 l'))     // Son 6 litros que absorve el grano mas un estimado de evaporación
                    ->final(Scalar::Volume('25.4 l'))
                ->densidad(Scalar::Density('9 P'), Scalar::Temperature('78 C'))
            ->hervir(CarbonInterval::minutes(60))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('25.37 g'), CarbonInterval::minutes(45), 17.3)
                ->lupulo(Lupulo::byNombre('Saaz'), Scalar::Weight('10.6 g'), CarbonInterval::minutes(5))
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('16.56 g'), CarbonInterval::minutes(5), 6.4)
            ->final(Scalar::Volume('26 l'))
//                ->envasar('b330', 1)
            ->fermentar([
                'fermentador' => 'Anvil 7.5 gl',
                'volumen' => Scalar::Volume('23 l'),
                'levadura' => [
                    'nombre' => 'Safbrew S-33',
                    'estado' => 'lavada'
                ],
                'densidad_inicial' => Scalar::Density('1.063 sg')
            ]);
//            ->envasar('2019-8-4', 'b710', 10)
//            ->envasar('b500', 21)
//            ->envasar('g500', 4)
//            ->envasar('b330', 13);

    }
}
