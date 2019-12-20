<?php

use App\Models\Malteria;
use Illuminate\Database\Seeder;

class MalteriasTableSeeder extends Seeder
{
    public function run()
    {
        Malteria::create([
            'nombre' => 'Castle Malting'
        ]);

        Malteria::create([
            'nombre' => 'Weyermann'
        ]);

        Malteria::create([
            'nombre' => 'Briess'
        ]);

        Malteria::create([
            'nombre' => 'BestMalz'
        ]);

        Malteria::create([
            'nombre' => 'Maltería Oriental S.A.'
        ]);

        Malteria::create([
            'nombre' => 'American'
        ]);

	    Malteria::create([
		    'nombre' => 'German'
	    ]);

        Malteria::create([
            'nombre' => 'Cargill S.A.'
        ]);

	    Malteria::create([
		    'nombre' => 'Genérica'
	    ]);
    }
}
