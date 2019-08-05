<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Envase extends Model
{
    public function contenido()
    {
        return $this->morphTo();
    }
}
