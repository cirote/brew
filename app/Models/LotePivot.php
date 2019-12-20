<?php

namespace App\Models;

use Cirote\Scalar\Facade\Scalar;
use Illuminate\Support\Facades\Input;

trait LotePivot
{
    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function receta()
    {
        return $this->lote->receta();
    }

    public function getCantidadAttribute($valor)
	{
		return Scalar::Weight($valor);
	}

    public function getCantidadAjustadaAttribute()
    {
        $volumenMuertoOlla = 3;

        $volumenReceta = $this->receta->tamaño->val();

        $cantidadEnGranos = $this->cantidad->convert('g')->val();

        $volumenEnFermentador = Input::get('volumen', 25);

        $volumenTotal = $volumenEnFermentador + $volumenMuertoOlla;

        return Scalar::Weight($cantidadEnGranos / $volumenReceta * $volumenTotal);
    }
}
