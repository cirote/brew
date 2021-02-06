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

    public function levadura($nombre, $estado = 'Seca')
    {
        $this->levadura_id = Levadura::where('nombre', $nombre)->first()->id;

        $this->levadura_estado = $estado;

        return $this->terminar();
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
		if ($this->densidad_final->val() > 0)
			return ($this->densidad_inicial->val() - $this->densidad_final->val()) * 105 * 1.25;
		
		return 0;
    }
}
