<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;

class MaltaRecetaPivot extends Pivot
{
    public function getCantidadAttribute($valor)
    {
        Config::registerDefault('weight', new ConfigWeight());

        return new Weight($valor);
    }
}