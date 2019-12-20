<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function getFechaAttribute()
    {
        return $this->brewed_at->format('d/m/Y');
    }

    public function getLitrosAttribute()
    {
        $litros = 0;

        foreach ($this->envases as $envase)
            $litros += $envase->litros;

        return $litros;
    }

}
