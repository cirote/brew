<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class triple_blond extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Triple Blond');

        $receta->cocinar('2021-02-28')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('5460 g'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('644 g'))
                    ->malta(Malta::byNombre('Château Cara Clair'), Scalar::Weight('280 g'))
                    ->malta(Malta::byNombre('Château Wheat Blanc'), Scalar::Weight('280 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(45))
                    ->alphaRest(CarbonInterval::minutes(10))
                    ->mashOut()
//					->azucar(Scalar::Weight('120 g'))
				->agua(Scalar::Volume('6 gallons'))
                    ->lavado(Scalar::Volume('9 l'))
                    ->final(Scalar::Volume('26 l'))
                ->densidad(Scalar::Density('1.055 sg'))
            ->hervir(CarbonInterval::minutes(60))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('10.73 g'), CarbonInterval::minutes(55), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('32.03 g'), CarbonInterval::minutes(5), 6.4)
				->final(Scalar::Volume('17.5 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('S-04', 'Seca')
				->inicio(Scalar::Volume('16.5 l'), Scalar::Density('1.080 sg'))
				->final(Scalar::Density('1.045 sg'))
            ->envasar('2021-03-14', 'b20', 1, Scalar::Volume('9 l'))
                ->envasar('b710', 3)
                ->envasar('b500', 9)
                ->envasar('b330', 5);

        $receta->cocinar('2020-11-29')
            ->macerar()
                ->malta(Malta::byNombre('Château Pilsen 2RS'), Scalar::Weight('4.68 kg'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('0.552 kg'))
                    ->malta(Malta::byNombre('Château Cara Clair'), Scalar::Weight('0.24 kg'))
                    ->malta(Malta::byNombre('Château Wheat Blanc'), Scalar::Weight('0.24 kg'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(45))
                    ->alphaRest(CarbonInterval::minutes(10))
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
            ->fermentar('Anvil 7.5 gl')
				->levadura('S-33', 'Seca')
				->inicio(Scalar::Volume('18.5 l'), Scalar::Density('1.059 sg'))
            ->envasar('2020-11-15', 'b20', 1, Scalar::Volume('16 l'))
                ->envasar('g2500', 1)
			->opinion('Esteban', 8, 'Muy fresca');
	}
}
