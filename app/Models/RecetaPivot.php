<?php

namespace App\Models;

use Illuminate\Support\Facades\Input;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use App\Types\Config\Weight as ConfigWeight;

trait RecetaPivot
{
	public function getCantidadAttribute($valor)
	{
		Config::registerDefault('weight', new ConfigWeight());

		return new Weight($valor);
	}

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function getCantidadAjustadaAttribute()
    {
        $volumenMuertoOlla = 3;

        $volumenReceta = $this->receta->tamaño->val();

        $cantidadEnGranos = $this->cantidad->convert('g')->val();

        $volumenEnFermentador = Input::get('volumen', 25);

        $volumenTotal = $volumenEnFermentador + $volumenMuertoOlla;

        return new Weight($cantidadEnGranos / $volumenReceta * $volumenTotal, new ConfigWeight());
    }
}