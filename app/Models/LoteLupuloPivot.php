<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LoteLupuloPivot extends Pivot
{
    use LotePivot;

    public function getEquivalenteAmargorAttribute()
    {
        return $this->cantidadAjustada->division(15)->multiply(3.5);
    }
}