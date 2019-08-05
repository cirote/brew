<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Input;
use JBZoo\SimpleTypes\Type\Weight;
use App\Types\Config\Weight as ConfigWeight;

class MaltaRecetaPivot extends Pivot
{
	use RecetaPivot;

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