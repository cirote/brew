<?php

namespace App\Models;

use App\Types\Config\Weight as ConfigWeight;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Database\Eloquent\Model;

class Envase extends Model
{
    protected $dates = ['created_at', 'updated_at', 'bottled_at'];

    public function getProductoAttribute()
    {
        if ($this->contenido_type == Hervido::class)
            return 'Mosto';

        if ($this->contenido_type == Fermentado::class)
            return 'Cerveza';

        return 'Error';
    }

    public function contenido()
    {
        return $this->morphTo();
    }

    public function tipo()
    {
        return $this->belongsTo(TipoEnvase::class, 'tipo_id');
    }

    public function getLitrosAttribute()
    {
        return $this->tipo->capacidad->val() * $this->cantidad;
    }
}
