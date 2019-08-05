<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fermentado extends Model
{
    use Envasable;

    public function fermentable()
    {
        return $this->morphTo();
    }
}
