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

        $receta->cocinar('2022-04-10')
            ->macerar()
                ->malta(Malta::byNombre('Pilsen UMA'), Scalar::Weight('6000 g'))
                    ->malta(Malta::byNombre('CaraHell'), Scalar::Weight('350 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(90))
                    ->alphaRest(CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('19 l'))
//    				->previo_lavado(Scalar::Density('1.065 sg'))
                    ->lavado(Scalar::Volume('10 l'))
                    ->final(Scalar::Volume('25 l'), Scalar::Density('1.038 sg'))
            ->hervir(CarbonInterval::minutes(90))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('23.02 g'), CarbonInterval::minutes(18), 17.3)
                ->lupulo(Lupulo::byNombre('Cascade'), Scalar::Weight('13.20 g'), CarbonInterval::minutes(18), 6.4)
				->final(Scalar::Volume('22 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('S-23', 'Seca')
				->inicio(Scalar::Volume('22 l'), Scalar::Density('1.049 sg'))
				->final(Scalar::Density('1.003 sg'))    // Ya corregida, la del refractometro fue 1.020
            ->envasar('2021-08-29', 'b20', 1, Scalar::Volume('17 l'))
                ->envasar('g500', 9)
                ->envasar('b500', 3);
			// ->opinion('Emilia', 9, 'Suave, fresca y agradable de tomar')
			// ->opinion('Miguel', 8, 'Bastante cuerpo. Buena espuma. Amargo ok y con sabor lupulado');
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
