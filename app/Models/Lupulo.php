<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lupulo extends Model
{
    public static function byNombre($nombre)
    {
        return static::where('variedad', $nombre)->first();
    }
}
