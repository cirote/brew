<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class harp_irish extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Harp Irish Lager Clone');

        $receta->cocinar('2022-05-01')
            ->macerar()
                ->malta(Malta::byNombre('Pilsen UMA'), Scalar::Weight('6000 g'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('350 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(90))
                    ->alphaRest(CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('20 l'))
//    				->previo_lavado(Scalar::Density('1.069 sg'))
                    ->lavado(Scalar::Volume('11 l'))
                    ->final(Scalar::Volume('26.5 l'), Scalar::Density('1.051 sg'))
            ->hervir(CarbonInterval::minutes(90))   // 30 litros
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('8.63 g'), CarbonInterval::minutes(90), 17.3)
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('9.11 g'), CarbonInterval::minutes(15), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('25.69 g'), CarbonInterval::minutes(15), 6.4)
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('10.11 g'), CarbonInterval::minutes(5), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('9.76 g'), CarbonInterval::minutes(5), 6.4)
                //  ->ibus(29.8)
				->final(Scalar::Volume('25.5 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('W-34/70', 'Lavada')
				->inicio(Scalar::Volume('22 l'), Scalar::Density('1.056 sg'))
				->final(Scalar::Density('1.013 sg'))    // Ya corregida, la del refractometro fue 1.027
            ->envasar('2022-05-15', 'b20', 1, Scalar::Volume('18 l'))
                ->envasar('b600', 10)
                ->envasar('b500', 5);
			// ->opinion('Nombre', 8, 'Opinion');

        $receta->cocinar('2022-04-10')
            ->macerar()
                ->malta(Malta::byNombre('Pilsen UMA'), Scalar::Weight('6000 g'))
                    ->malta(Malta::byNombre('Château Cara Blond'), Scalar::Weight('350 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(90))
                    ->alphaRest(CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('19 l'))
//    				->previo_lavado(Scalar::Density('1.065 sg'))
                    ->lavado(Scalar::Volume('10 l'))
                    ->final(Scalar::Volume('25.5 l'), Scalar::Density('1.048 sg'))
            ->hervir(CarbonInterval::minutes(90))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('8.45 g'), CarbonInterval::minutes(90), 17.3)
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('8.21 g'), CarbonInterval::minutes(15), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('24.37 g'), CarbonInterval::minutes(15), 6.4)
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('9.41 g'), CarbonInterval::minutes(5), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('9.03 g'), CarbonInterval::minutes(5), 6.4)
                //  ->ibus(29.8)
				->final(Scalar::Volume('22 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('W-34/70', 'Seca')
				->inicio(Scalar::Volume('22 l'), Scalar::Density('1.049 sg'))
				->final(Scalar::Density('1.014 sg'))    // Ya corregida, la del refractometro fue 1.030
            ->envasar('2022-05-01', 'b20', 1, Scalar::Volume('18 l'))
                ->envasar('g500', 11)
                ->envasar('b500', 9)
			->opinion('Esteban', 8, 'Suave y amarga. Le falto un poco de aroma');
    }

    private function agregarLote($receta)
    {
        $r = Receta::byNombre($receta['receta'])
            ->lotes()->create([
                'brewed_at' => $receta['brewed_at']
            ]);

        foreach ($receta['hervido']['lupulos'] as $lupulo)
            $r->lupulos()
                ->save(Lupulo::byNombre($lupulo['nombre']), [
                    'cantidad' => $lupulo['cantidad'],
                    'aa' => $lupulo['aa'] ?? null,
                    'momento' => $lupulo['momento'] ?? 10
                ]);

        return $r;
    }
}
