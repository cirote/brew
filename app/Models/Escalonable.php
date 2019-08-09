<?php

namespace App\Models;

use Carbon\CarbonInterval;
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

    public function mashOut()
    {
        return $this->escalon(new Temperature('170 °F'), CarbonInterval::create(0,0,0,0,0,10));
    }
}
