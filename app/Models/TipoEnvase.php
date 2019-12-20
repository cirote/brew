<?php

namespace App\Models;

//use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;

class TipoEnvase extends Model
{
    public static function byAbreviatura($abreviatura)
    {
        return static::whereAbreviatura($abreviatura)->first();
    }

    public function getDenominacionAttribute()
    {
        return $this->nombre . ' de ' . $this->capacidad;
    }

    public function getCapacidadAttribute($valor)
    {
        return Scalar::volume($valor);
    }
}
