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

        Malteria::byNombre('UMA')
            ->maltas()->createMany([[
                'nombre' => 'Pilsen UMA'
            ], [
                'nombre' => 'Vienna UMA'
            ]]);

        Malteria::byNombre('Weyermann')
            ->maltas()->createMany([[
                'nombre' => 'CaraAmber'
            ], [
                'nombre' => 'CaraHell'
            ]]);

        Malteria::byNombre('Castle Malting')
            ->maltas()->createMany([[
                'nombre' => 'Château Pilsen 2RS'
            ], [
                'nombre' => 'Château Biscuit'
            ], [
                'nombre' => 'Château Black'
            ], [
                'nombre' => 'Château Cafe Light'
            ], [
                'nombre' => 'Château Cara Blond'
	        ], [
		        'nombre' => 'Château Cara Clair'
            ], [
                'nombre' => 'Château Cara Gold'
            ], [
                'nombre' => 'Château Cara Ruby'
            ], [
                'nombre' => 'Château Melano'
            ], [
                'nombre' => 'Château Melano Light'
            ], [
                'nombre' => 'Château Chocolat'
            ], [
                'nombre' => 'Château Chocolat Light'
            ], [
                'nombre' => 'Château Special B'
            ], [
                'nombre' => 'Château Wheat Blanc'
            ], [
                'nombre' => 'Castle Crystal'
            ], [
                'nombre' => 'Château Peated'
            ], [
                'nombre' => 'Château Oat'
            ], [
                'nombre' => 'Château Rye Malt'
            ]]);

        Malteria::byNombre('American')
            ->maltas()->createMany([[
                'nombre' => 'American Pale 2-Row'
            ], [
                'nombre' => 'American Pale 6-Row'
            ], [
                'nombre' => 'American Carapils'
            ]]);

	    Malteria::byNombre('German')
		    ->maltas()->create([
			    'nombre' => 'German Pilsner'
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
