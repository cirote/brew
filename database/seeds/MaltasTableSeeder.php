<?php

use App\Models\{Malta, Malteria};
use Illuminate\Database\Seeder;

class MaltasTableSeeder extends Seeder
{
    public function run()
    {
        Malteria::byNombre('Maltería Oriental S.A.')
            ->maltas()->create([
                'nombre' => 'Malta tipo pilsen (MOSA)'
            ]);

        Malteria::byNombre('Weyermann')
            ->maltas()->create([
                'nombre' => 'CaraAmber'
            ]);

        Malteria::byNombre('Castle Malting')
            ->maltas()->createMany([[
                'nombre' => 'Château Pilsen 2RS'
            ], [
                'nombre' => 'Château Wheat Blanc'
            ], [
                'nombre' => 'Château Cara Gold'
            ], [
                'nombre' => 'Château Cara Ruby'
            ], [
                'nombre' => 'Château Cara Blond'
	        ], [
		        'nombre' => 'Château Cara Clair'
            ], [
                'nombre' => 'Château Biscuit'
            ], [
                'nombre' => 'Château Chocolat'
            ], [
                'nombre' => 'Château Black'
            ], [
                'nombre' => 'Château Special B'
            ], [
                'nombre' => 'Castle Crystal'
            ], [
                'nombre' => 'Château Peated'
            ], [
                'nombre' => 'Château Rye Malt'
            ]]);

        Malteria::byNombre('American')
            ->maltas()->create([
                'nombre' => 'Pale 2-Row'
            ]);

	    Malteria::byNombre('German')
		    ->maltas()->create([
			    'nombre' => 'Pilsner'
		    ]);

        Malteria::byNombre('Cargill S.A.')
            ->maltas()->create([
                'nombre' => 'Malta Pilsen Cargill'
	        ], [
		        'nombre' => 'Pale Ale Cargill'
	        ], [
		        'nombre' => 'Munich Cargill'
	        ]);

	    Malteria::byNombre('Genérica')
		    ->maltas()->create([
			    'nombre' => 'Corn'
		    ]);

    }
}
