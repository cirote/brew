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

    public function inicial(CarbonInterval $duracion)
    {
        return $this->escalon(Scalar::Temperature('30 °C'), $duracion);
    }

    public function empaste(CarbonInterval $duracion)
    {
        return $this->escalon(Scalar::Temperature('35 °C'), $duracion);
    }

	public function acidRest(CarbonInterval $duracion)
	{
		return $this->escalon(Scalar::Temperature('35 °C'), $duracion);
	}

	public function proteinRest(CarbonInterval $duracion)
	{
		return $this->escalon(Scalar::Temperature('52 °C'), $duracion);
	}

	public function alphaRest(CarbonInterval $duracion)
	{
		return $this->escalon(Scalar::Temperature('70 °C'), $duracion);
	}

	public function betaRest(CarbonInterval $duracion)
	{
		return $this->escalon(Scalar::Temperature('63 °C'), $duracion);
	}

	public function mashOut()
    {
        return $this->escalon(Scalar::Temperature('75 °C'), CarbonInterval::minutes(10));
    }

    public function hervido(CarbonInterval $duracion)
    {
        return $this->escalon(Scalar::Temperature('100 °C'), $duracion);
    }
}
