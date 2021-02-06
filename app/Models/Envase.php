<?php

namespace App\Models;

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

    public function getVolumenAttribute($valor)
    {
        return \Scalar::Volume($valor);
    }

    public function getLitrosAttribute()
    {
		if (($vol = $this->volumen->val()) > 0)
			return $vol;

        return $this->tipo->capacidad->val() * $this->cantidad;
    }
}
