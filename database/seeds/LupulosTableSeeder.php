<?php

use App\Models\Lupulo;
use Illuminate\Database\Seeder;

class LupulosTableSeeder extends Seeder
{
    public function run()
    {
        Lupulo::create([
        	'variedad' => 'Magnum',
	        'aa' => 5
        ]);
    }
}
