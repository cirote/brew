<?php

namespace App\Models;

use Illuminate\Support\Carbon;

trait Envasable
{
    public function envasado()
    {
        return $this->morphMany(Envase::class, 'contenido');
    }

    public function envasar(...$datos)
    {
        static $ultima_fecha;

        $cantidad = 1;

        $tipo = TipoEnvase::byAbreviatura('b500');

        if (count($datos) == 1)
            $cantidad = (int) $datos[0];

        if (count($datos) == 2) {

            $tipo = TipoEnvase::byAbreviatura($datos[0]);

            $cantidad = (int) $datos[1];
        }

        if (count($datos) == 3) {

            $ultima_fecha = Carbon::create($datos[0]);

            $tipo = TipoEnvase::byAbreviatura($datos[1]);

            $cantidad = (int) $datos[2];
        }

        $this->envasado()->create([
            'bottled_at' => $ultima_fecha,
            'tipo' => $tipo->id,
            'cantidad' => $cantidad
        ]);

        return $this;
    }
}