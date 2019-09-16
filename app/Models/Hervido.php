<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Type\Weight;

class Hervido extends Model
{
    const TASA_DE_EVAPORACION = 10;

    use Fermentable;

    public function getDuracionAttribute($value)
    {
        return CarbonInterval::createFromDateString($value);
    }

    public function getMinutosAttribute()
    {
        $minutos = $this->duracion->minutes;

        $horas = $this->duracion->hours;

        return $horas * 60 + $minutos;
    }

    public function getVolumenEstimadoAttribute()
    {
        $densidadReceta = ($this->receta->gravedad_original->convert('sg')->val() - 1) * 1000;

        $densidadMacerado = ($this->macerado->densidad->convert('sg')->val() - 1) * 1000;

        $volumenMacerado = $this->macerado->final->val();

        $volumenEstimado = $densidadMacerado * $volumenMacerado / $densidadReceta;

        return Scalar::Volume($volumenEstimado);
    }

    public function getVolumenPrevioAttribute()
    {
        $volumenFinal = $this->volumenEstimado->val();

        $volumenEstimado = $volumenFinal / (1 - (($this->tasaDeEvaporacion / 100) * (130 / 60)));

        return Scalar::Volume($volumenEstimado);
    }

    public function macerado()
    {
        return $this->belongsTo(Macerado::class);
    }

    public function receta()
    {
        return $this->macerado->lote->receta();
    }

    public function getTasaDeEvaporacionAttribute()
    {
        return static::TASA_DE_EVAPORACION;
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class)
            ->using(HervidoLupuloPivot::class)
            ->withPivot(['cantidad', 'momento', 'aa']);
    }

    public function lupulo(Lupulo $lupulo, Weight $cantidad, CarbonInterval $minutosDespuesDelHervor, $aa = null)
    {
        $this->lupulos()
            ->save($lupulo, [
                'cantidad' => $cantidad,
                'momento' => $minutosDespuesDelHervor,
                'aa' => $aa
            ]);

        return $this;
    }

    public function final(Volume $volumen)
    {
        $this->final = $volumen;

        $this->save();

        return $this;
    }

}
