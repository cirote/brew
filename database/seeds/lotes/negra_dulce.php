<?php

use Cirote\Scalar\Facade\Scalar;
use App\Models\{Lupulo, Malta, Receta, TipoEnvase};
use Carbon\CarbonInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class negra_dulce extends Seeder
{
    public function run()
    {
        $receta = Receta::byNombre('Negra Dulce (Almacen Cervecero)');

        $receta->cocinar('2022-05-28')
            ->macerar()
                ->malta(Malta::byNombre('Pilsen UMA'), Scalar::Weight('5250 g'))
                    ->malta(Malta::byNombre('Vienna UMA'), Scalar::Weight('600 g'))
                    ->malta(Malta::byNombre('Château Chocolat'), Scalar::Weight('750 g'))
                    ->malta(Malta::byNombre('Château Cafe Light'), Scalar::Weight('150 g'))
                    ->malta(Malta::byNombre('Château Special B'), Scalar::Weight('75 g'))
                ->inicial(CarbonInterval::minutes(5))
                    ->empaste(CarbonInterval::minutes(10))
                    ->betaRest(CarbonInterval::minutes(90))
                    ->alphaRest(CarbonInterval::minutes(10))
                    ->mashOut()
                ->agua(Scalar::Volume('22 l'))
                    ->lavado(Scalar::Volume('11 l'))
                    ->final(Scalar::Volume('29 l'), Scalar::Density('1.045 sg'))
            ->hervir(CarbonInterval::minutes(90))
                ->lupulo(Lupulo::byNombre('Columbus'), Scalar::Weight('45.05 g'), CarbonInterval::minutes(80), 12.65)
                //  ->ibus(62.1)
				->final(Scalar::Volume('25.5 l'))
            ->fermentar('Anvil 7.5 gl')
				->levadura('W-34/70', 'Lavada')
				->inicio(Scalar::Volume('22 l'), Scalar::Density('1.058 sg'))
				->final(Scalar::Density('1.999 sg'))    // Ya corregida, la del refractometro fue 1.027
            ->envasar('2022-05-15', 'b20', 1, Scalar::Volume('18 l'))
                ->envasar('b600', 10)
                ->envasar('b500', 5);
			// ->opinion('Nombre', 8, 'Opinion');

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
