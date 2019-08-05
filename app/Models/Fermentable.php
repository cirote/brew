<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

trait Fermentable
{
    public function fermentados()
    {
        return $this->morphMany(Fermentado::class, 'fermentable');
    }

    public function fermentar()
    {
        return $this->fermentados()->create();
    }
}
