<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Levadura extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('nombre', $nombre)->first();
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }
}
