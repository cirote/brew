<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HervidoLupuloPivot extends Pivot
{
    public function getMomentoAttribute($value)
    {
        return CarbonInterval::createFromDateString($value);
    }
}
