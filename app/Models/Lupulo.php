<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lupulo extends Model
{
	public function getAAAttribute($value)
	{
		return ($value / 100);
	}
}
