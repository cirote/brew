<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malta extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('nombre', $nombre)->first();
    }

    public function malteria()
    {
        return $this->belongsTo(Malteria::class);
    }
}
