<?php

namespace App\Models;

use Illuminate\Support\Facades\Input;
use JBZoo\SimpleTypes\Config\Config;
use JBZoo\SimpleTypes\Type\Weight;
use App\Types\Config\Weight as ConfigWeight;

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
		Config::registerDefault('weight', new ConfigWeight());

		return new Weight($valor);
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