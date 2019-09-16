<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Cirote\Scalar\Facade\Scalar;
use JBZoo\SimpleTypes\Type\Temp as Temperature;

trait Escalonable
{

    public function escalones()
    {
        return $this->morphMany(Escalon::class, 'escalonable');
    }

    public function escalon(Temperature $temperatura, CarbonInterval $duracion)
    {
        $this->escalones()->create([
            'temperatura' => $temperatura,
            'duracion' => $duracion
        ]);

        return $this;
    }

    public function mashOut(Temperature $temperature = null)
    {
        return $this->escalon(Scalar::Temperature($temperature ?? '78 °C'), CarbonInterval::minutes(2));
    }

    public function hervido(CarbonInterval $duracion)
    {
        return $this->escalon(Scalar::Temperature('100 °C'), $duracion);
    }
}
