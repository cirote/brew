<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('nombre', $nombre)->first();
    }

    public function maltas()
    {
        return $this->belongsToMany(Malta::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class);
    }
}
