<?php

namespace App\Models;

use Cirote\Scalar\Facade\Scalar;
use Illuminate\Support\Facades\Input;
use JBZoo\SimpleTypes\Type\Volume;

trait RecetaPivot
{
	public function getCantidadAttribute($valor)
	{
		return Scalar::Weight($valor);
	}

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function cantidadAjustada(string $volumen = null)
    {
        $volumenMuertoOlla = 3;

        $volumenReceta = $this->receta->tamaño->val();

        $cantidadEnGranos = $this->cantidad->convert('g')->val();

        if ($volumen)
        {
            $volumen = Scalar::Volume($volumen);

            $volumenEnFermentador = $volumen->val();
        }
        else
            $volumenEnFermentador = Input::get('volumen', 25);

        $volumenTotal = $volumenEnFermentador + $volumenMuertoOlla;

        return Scalar::Weight($cantidadEnGranos / $volumenReceta * $volumenTotal);
    }

    public function getCantidadAjustadaAttribute()
    {
        return $this->cantidadAjustada();
    }
}
