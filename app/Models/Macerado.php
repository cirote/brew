<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use JBZoo\SimpleTypes\Type\Temp as Temperature;
use JBZoo\SimpleTypes\Type\Volume;
use JBZoo\SimpleTypes\Type\Weight;
use App\Types\Type\Density;

class Macerado extends Model
{
    use Envasable;

    use Escalonable;

    public function hervido()
    {
        return $this->hasOne(Hervido::class);
    }

    public function hervir()
    {
        return $this->hervido()->create();
    }

    public function maltas()
    {
        return $this->belongsToMany(Malta::class)
            ->using(MaceradoMaltaPivot::class)
            ->withPivot(['cantidad']);
    }

    public function malta(Malta $malta, Weight $cantidad)
    {
        $this->maltas()
            ->save($malta, ['cantidad' => $cantidad]);

        return $this;
    }

    public function agua(Volume $volumen)
    {
        $this->agua = $volumen;

        $this->save();

        return $this;
    }

    public function lavado(Volume $volumen)
    {
        $this->lavado = $volumen;

        $this->save();

        return $this;
    }

    public function final(Volume $volumen)
    {
        $this->final = $volumen;

        $this->save();

        return $this;
    }

    public function densidad(Density $densidad, Temperature $temperatura = null)
    {
        $this->densidad = $densidad;

        if ($temperatura)
            $this->temperatura = $temperatura;

        $this->save();

        return $this;
    }

}
