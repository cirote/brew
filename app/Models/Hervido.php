<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Type\Weight;

class Hervido extends Model
{
    const TASA_DE_EVAPORACION = 12;
    const TASA_DE_EVAPORACION_LARGA = 10;

    use Fermentable;

    use Envasable;

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
		if ($this->inicial)
		{
			return Scalar::Volume(
				Scalar::Volume($this->inicial)->convert('lit')->val() - $this->tasaDeEvaporacion * $this->minutos
			);
		}

        $densidadReceta = ($this->receta->gravedad_original->convert('sg')->val() - 1) * 1000;

        $densidadMacerado = ($this->macerado->densidad->convert('sg')->val() - 1) * 1000;

        $volumenMacerado = $this->macerado->final->val();

        $volumenEstimado = $densidadMacerado * $volumenMacerado / $densidadReceta;

        return Scalar::Volume($volumenEstimado);
    }

    public function getDensidadObjetivoMaceradoAttribute()
    {
        $volumenFinal = 25;

        $volumenEstimado = $volumenFinal + $this->tasaDeEvaporacion * $this->minutos;

        $densidadReceta = ($this->receta->gravedad_original->convert('sg')->val() - 1) * 1000;

        return Scalar::Density(
			(1 + ($densidadReceta * $volumenFinal / $volumenEstimado) / 1000) . ' sg'
		)->convert('sg');
    }

    public function getVolumenPrevioAttribute()
    {
		if ($this->inicial)
		{
			return Scalar::Volume($this->inicial)->convert('lit');
		}

        $volumenFinal = $this->volumenEstimado->val();

        $volumenEstimado = $volumenFinal + $this->tasaDeEvaporacion * $this->minutos;

        return Scalar::Volume($volumenEstimado);

		$volumenEstimado = $volumenFinal / (1 - (($this->tasaDeEvaporacion / 100) * ($this->minutos / 60)));

        return Scalar::Volume($volumenEstimado);
    }

    public function getAguaAAgregarAttribute()
    {
        return Scalar::Volume($this->volumenPrevio->val() - $this->macerado->final->val());
    }

    public function getMinutosAAgregarAttribute()
    {
        return (-$this->aguaAAgregar->val()) / $this->tasaDeEvaporacion;
    }

    public function macerado()
    {
        return $this->belongsTo(Macerado::class);
    }

    public function fecha()
    {
        return $this->macerado->lote->brewed_at;
    }

    public function receta()
    {
        return $this->macerado->lote->receta();
    }

    public function getTasaDeEvaporacionAttribute()
    {
        return 7.5 / 140;   // Tasa en litros por minuto

        return $this->minutos > 90
            ? static::TASA_DE_EVAPORACION_LARGA
            : static::TASA_DE_EVAPORACION;
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
