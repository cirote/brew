<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;
use JBZoo\SimpleTypes\Type\Temp as Temperature;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Type\Weight;
use App\Types\Type\Density;

class Macerado extends Model
{
    use Envasable;

    use Escalonable;

    public function hervido()
    {
        return $this->hasOne(Hervido::class);
    }

    public function hervir(CarbonInterval $tiempo, Volume $volumen = null)
    {
        $this->escalon(Scalar::Temperature('100 °C'), $tiempo);

        return $this->hervido()->create([
                'duracion' => $tiempo,
				'inicial' => $volumen,
            ]);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function maltas()
    {
        return $this->belongsToMany(Malta::class)
            ->using(MaceradoMaltaPivot::class)
            ->withPivot(['cantidad']);
    }

    public function malta(Malta $malta, Weight $cantidad)
    {
        $this->maltas()
            ->save($malta, ['cantidad' => $cantidad]);

        return $this;
    }

    public function agua(Volume $volumen)
    {
        $this->agua = $volumen;

        $this->save();

        return $this;
    }

    public function getAguaAttribute($value)
    {
        return Scalar::Volume($value);
    }

    public function lavado(Volume $volumen)
    {
        $this->lavado = $volumen;

        $this->save();

        return $this;
    }

    public function final(Volume $volumen, Density $densidad = null, Temperature $temperatura = null)
    {
        $this->final = $volumen;

		if ($densidad)
	        $this->densidad($densidad, $temperatura);

        $this->save();

        return $this;
    }

    public function densidad(Density $densidad, Temperature $temperatura = null)
    {
        $this->densidad = $densidad;

        if ($temperatura)
            $this->temperatura = $temperatura;

        $this->save();

        return $this;
    }

    public function densidadAntesDeLavar(Density $densidad)
    {
        $this->densidad_antes_de_lavar = $densidad;

        $this->save();

        return $this;
    }

    public function getDensidadAntesDeLavarAttribute($value)
    {
        return Scalar::Density($value);
    }

    public function getEstimacionPerdidaAttribute()
    {
        return Scalar::Volume(
			$this->lote->cantidad_malta->convert('kg')->val() * 0.85 
		);
    }

    public function getEstimacionAguaAttribute($value)
    {
		$aguda_previo_al_lavado = $this->agua->val() - $this->estimacion_perdida->val();

		$densidad_antes_de_lavar = $this->densidad_antes_de_lavar->convert('sg')->val() - 1;

		$densidad_objetivo = $this->hervido->densidadObjetivoMacerado->convert('sg')->val() - 1;

		$volumen_objetivo = ($aguda_previo_al_lavado * $densidad_antes_de_lavar) /  $densidad_objetivo;

        return Scalar::Volume(
			$volumen_objetivo - $aguda_previo_al_lavado
		);
    }

    public function getDensidadAttribute($value)
    {
        return Scalar::Density($value);
    }

    public function getFinalAttribute($value)
    {
        return Scalar::Volume($value);
    }
}
