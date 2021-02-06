<?php

namespace App\Models;

use Illuminate\Support\Carbon;

trait Envasable
{
    public function envases()
    {
        return $this->morphMany(Envase::class, 'contenido');
    }

    public function envasar(...$datos)
    {
        static $ultima_fecha;

        $cantidad = 1;

        $tipo = TipoEnvase::byAbreviatura('b500');

		$volumen = null;

        if (count($datos) == 1)
            $cantidad = (int) $datos[0];

        if (count($datos) == 2) 
		{
            $tipo = TipoEnvase::byAbreviatura($datos[0]);

            $cantidad = (int) $datos[1];
        }

        if (count($datos) == 3) 
		{
            $ultima_fecha = Carbon::create($datos[0]);

            $tipo = TipoEnvase::byAbreviatura($datos[1]);

            $cantidad = (int) $datos[2];
        }

        if (count($datos) == 4) 
		{
            $ultima_fecha = Carbon::create($datos[0]);

            $tipo = TipoEnvase::byAbreviatura($datos[1]);

            $cantidad = (int) $datos[2];

            $volumen = $datos[3];
		}

        if (! $ultima_fecha)
            $ultima_fecha = $this->fecha();

        $this->envases()->create([
            'bottled_at' => $ultima_fecha,
            'tipo_id' => $tipo->id,
            'cantidad' => $cantidad,
			'volumen' => $volumen
        ]);

        return $this;
    }
}
