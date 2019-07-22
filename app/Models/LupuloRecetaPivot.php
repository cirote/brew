<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use JBZoo\SimpleTypes\Config\Weight as ConfigWeight;

class LupuloRecetaPivot extends Pivot
{
    public function getCantidadAttribute($valor)
    {
        Config::registerDefault('weight', new ConfigWeight());

        return new Weight($valor);
    }

    public function getCantidadAjustadaAttribute()
    {
        return $this->cantidad->division(100)->multiply(29);
    }

    public function getEquivalenteAmargorAttribute()
    {
        return $this->cantidadAjustada->division(15)->multiply(3.5);
    }
}