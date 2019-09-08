<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LupuloRecetaPivot extends Pivot
{
    use RecetaPivot;

    public function getEquivalenteAmargorAttribute()
    {
        return $this->cantidadAjustada->division(15)->multiply(3.5);
    }
}
