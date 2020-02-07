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

	public function acidRest(CarbonInterval $duracion)
	{
		return $this->escalon(new Temperature('75 °C'), $duracion);
	}

	public function proteinRest(CarbonInterval $duracion)
	{
		return $this->escalon(new Temperature('52 °C'), $duracion);
	}

	public function alfhaRest(CarbonInterval $duracion)
	{
		return $this->escalon(new Temperature('70 °C'), $duracion);
	}

	public function betaRest(CarbonInterval $duracion)
	{
		return $this->escalon(new Temperature('63 °C'), $duracion);
	}

	public function mashOut()
    {
        return $this->escalon(new Temperature('75 °C'), CarbonInterval::create(0,0,0,0,0,10));
    }
}
