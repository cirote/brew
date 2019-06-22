<?php

use App\Models\Lupulo;
use Illuminate\Database\Seeder;

class LupulosTableSeeder extends Seeder
{
    public function run()
    {
        Lupulo::create([
        	'variedad' => 'Magnum',
	        'aa' => 15
        ]);

        Lupulo::create([
            'variedad' => 'Cascade',
            'aa' => 7
        ]);

        Lupulo::create([
            'variedad' => 'Columbus',
            'aa' => 15
        ]);

        Lupulo::create([
            'variedad' => 'Willamette',
            'aa' => 4.5
        ]);

        Lupulo::create([
            'variedad' => 'Fuggle',
            'aa' => 5.6
        ]);

        Lupulo::create([
            'variedad' => 'Saaz',
            'aa' => 3.5
        ]);

        Lupulo::create([
            'variedad' => 'Styrian Golding',
            'aa' => 5.25
        ]);

        Lupulo::create([
            'variedad' => 'Golding',
            'aa' => 5.6
        ]);

        Lupulo::create([
            'variedad' => 'Nugget',
            'aa' => 14
        ]);

        Lupulo::create([
            'variedad' => 'Hallertau',
            'aa' => 4.1
        ]);

        Lupulo::create([
            'variedad' => 'Perle',
            'aa' => 8.2
        ]);
    }
}
