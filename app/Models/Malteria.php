<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malteria extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('nombre', $nombre)->first();
    }

    public function maltas()
    {
        return $this->hasMany(Malta::class);
    }
}
