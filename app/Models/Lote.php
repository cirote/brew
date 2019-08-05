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

    public function maltas()
    {
        return $this->belongsToMany(Malta::class)
		    ->using(LoteMaltaPivot::class)
		    ->withPivot(['cantidad']);
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class)
	        ->using(LoteLupuloPivot::class)
	        ->withPivot(['cantidad']);
    }

    public function getFechaAttribute()
    {
        return $this->brewed_at->format('d/m/Y');
    }
}
