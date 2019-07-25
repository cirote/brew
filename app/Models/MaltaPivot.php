<?php

namespace App\Models;

use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;

trait MaltaPivot
{
	public function getCantidadAttribute($valor)
	{
		Config::registerDefault('weight', new ConfigWeight());

		return new Weight($valor);
	}
}