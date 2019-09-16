<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LupuloRecetaPivot extends Pivot
{
    use RecetaPivot;

    public function getEquivalenteAmargorAttribute()
    {
        return $this->cantidadAjustada->division(15)->multiply(3.5);
    }

    public function getDuracionAttribute()
    {
        return CarbonInterval::createFromDateString($this->tiempo_de_hervido);
    }

    public function getMinutosAttribute()
    {

        if (! $this->duracion)
            return false;

        $minutos = $this->duracion->minutes;

        $horas = $this->duracion->hours;

        return $horas * 60 + $minutos;
    }

}
