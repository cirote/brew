<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cirote\Scalar\Facade\Scalar;

class Lote extends Model
{
    protected $dates = ['created_at', 'updated_at', 'brewed_at'];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function macerado()
    {
        return $this->hasOne(Macerado::class);
    }

    public function getfermentadoAttribute()
    {
        return $this->macerado->hervido->fermentados()->first();
    }

    public function macerar()
    {
        return $this->macerado()->create();
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class)
	        ->using(LoteLupuloPivot::class)
	        ->withPivot(['cantidad']);
    }

    public function envases()
    {
        return $this->macerado->hervido->envases()
            ->union($this->macerado->hervido->fermentados()->first()->envases());
    }

    public function getCantidadMaltaAttribute()
    {
		$cantidad = 0;

		foreach($this->macerado->maltas as $malta)
		{
			$cantidad += $malta->pivot->cantidad->convert('g')->val();
		}

        return Scalar::Weight($cantidad . ' g')->convert('kg');
    }

    public function getFechaAttribute()
    {
        return $this->brewed_at->format('d/m/Y');
    }

    public function getFechaEnvasadoAttribute()
    {
        return $this->envases()->first()->bottled_at->format('d/m/Y');
    }

    public function getDiasDeFermentacionAttribute()
    {
        return $this->brewed_at->diffInDays($this->envases()->first()->bottled_at);
    }

    public function getAxvAttribute()
    {
        return $this->fermentado->axv;
    }

    public function getAtenuacionAttribute()
    {
        return $this->fermentado->atenuacion;
    }
	
    public function getLitrosAttribute()
    {
		return $this->envases->sum('litros');
    }

    public function opiniones()
    {
		return $this->fermentado->opiniones();
    }

    public function getPuntajeAttribute()
    {
		return $this->opiniones->avg('puntaje');
    }
}
