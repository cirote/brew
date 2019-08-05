<?php

namespace App\Models;

use App\Types\Config\Density as ConfigDensity;
use App\Types\Type\Density;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Config\Volume as ConfigVolume;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('nombre', $nombre)->first();
    }

    public function maltas()
    {
        return $this->belongsToMany(Malta::class)
            ->using(MaltaRecetaPivot::class)
            ->withPivot('cantidad');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class)
            ->using(LupuloRecetaPivot::class)
            ->withPivot(['cantidad', 'uso', 'aa', 'tiempo_de_hervido']);
    }

    public function getGravedadOriginalAttribute()
    {
        static $gravedad;

        if (!$gravedad)
            $gravedad = new Density($this->attributes['gravedad_original'], new ConfigDensity());

        return $gravedad->convert('sg');
    }

	public function getTamañoAttribute()
	{
		static $tamano;

		if (!$tamano)
			$tamano = new Volume($this->attributes['tamano'], new ConfigVolume());

		return $tamano->convert('lit');
	}
}
