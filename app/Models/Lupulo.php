<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lupulo extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('variedad', $nombre)->first();
    }

    public function sustitutos()
    {
        return $this->belongsToMany(Lupulo::class, 'lupulo_lupulo', 'lupulo_id', 'sustituto_id');
    }
}
