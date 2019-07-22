<?php

namespace App\Models;

use App\Types\Config\Density as ConfigDensity;
use App\Types\Type\Density;
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
            ->withPivot(['cantidad', 'uso']);
    }

    public function getGravedadOriginalAttribute()
    {
        static $gravedad;

        if (!$gravedad)
            $gravedad = new Density($this->attributes['gravedad_original'], new ConfigDensity());

        return $gravedad->convert('sg');
    }
}
