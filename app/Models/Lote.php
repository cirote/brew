<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $dates = ['created_at', 'updated_at', 'brewed_at'];

    public function maltas()
    {
        return $this->belongsToMany(Malta::class);
    }

    public function lupulos()
    {
        return $this->belongsToMany(Lupulo::class);
    }
}
