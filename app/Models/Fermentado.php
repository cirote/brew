<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cirote\Scalar\Facade\Scalar;

class Fermentado extends Model
{
    use Envasable;

    public function fermentable()
    {
        return $this->morphTo();
    }

    public function fermentador($nombre)
    {
        $this->fermentador_id = Fermentador::where('nombre', $nombre)->first()->id;

        return $this->terminar();
    }

    public function getFermentadorAttribute($value)
    {
        return Fermentador::find($this->fermentador_id);
    }

    public function levadura($nombre, $estado = 'Seca')
    {
        $this->levadura_id = Levadura::where('nombre', $nombre)->first()->id;

        $this->levadura_estado = $estado;

        return $this->terminar();
    }

    public function getLevaduraAttribute()
    {
        return Levadura::find($this->levadura_id);
    }

    public function inicio($volumen, $densidad)
    {
        $this->volumen_inicial = $volumen;

        $this->densidad_inicial = $densidad;

        return $this->terminar();
    }

    public function final($densidad)
    {
        $this->densidad_final = $densidad;

        return $this->terminar();
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class);
    }

    public function opinion($opinante, $puntaje, $opinion)
    {
        $this->opiniones()->create([
			'opinante' => $opinante,
			'puntaje'  => $puntaje,
			'opinion'  => $opinion
		]);

        return $this;
    }

    private function terminar()
    {
        $this->save();

        return $this;
    }

    public function getDensidadInicialAttribute($value)
    {
        return Scalar::Density($value);
    }

    public function getDensidadFinalAttribute($value)
    {
        return Scalar::Density($value);
    }

    public function getAxvAttribute()
    {
		return ($this->densidad_final->val() > 0)
			? ($this->densidad_inicial->val() - $this->densidad_final->val()) * 105 * 1.25
			: 0;
    }

    public function getAtenuacionAttribute()
    {
		return ($this->densidad_final->val() > 0)
			? ($this->densidad_inicial->val() - $this->densidad_final->val()) * 100 / ($this->densidad_inicial->val() - 1)
			: 0;
    }
}
