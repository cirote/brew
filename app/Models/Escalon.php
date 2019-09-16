<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;

class Escalon extends Model
{
    protected $table = 'escalones';

    public function getDuracionAttribute($value)
    {
        return CarbonInterval::createFromDateString($value);
    }

    public function getTemperaturaAttribute($value)
    {
        return Scalar::Temperature($value)->convert('C');
    }

    public function getMinutosAttribute()
    {
        $minutos = $this->duracion->minutes;

        $horas = $this->duracion->hours;

        return $horas * 60 + $minutos;
    }
}
