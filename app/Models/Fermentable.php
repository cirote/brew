<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

trait Fermentable
{
    public function fermentados()
    {
        return $this->morphMany(Fermentado::class, 'fermentable');
    }

    public function getFermentadoAttribute()
    {
        return $this->fermentados()->first();
    }

    public function fermentar($fermentador_nombre)
    {
		$fermentado = $this->fermentados()->create();

		if (! is_array($fermentador_nombre))
		{
			$fermentado->fermentador($fermentador_nombre);
		}

		return $fermentado;
    }
}
