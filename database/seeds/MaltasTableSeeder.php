<?php

use App\Models\{Malta, Malteria};
use Illuminate\Database\Seeder;

class MaltasTableSeeder extends Seeder
{
    public function run()
    {
        Malteria::byNombre('Maltería Oriental S.A.')
            ->maltas()->create([
                'nombre' => 'Malta tipo pilsen'
            ]);

        Malteria::byNombre('Castle Malting')
            ->maltas()->createMany([[
                'nombre' => 'Château Pilsen 2RS'
            ], [
                'nombre' => 'Château Wheat Blanc'
            ], [
                'nombre' => 'Château Cara Gold'
            ], [
                'nombre' => 'Château Chocolat'
            ], [
                'nombre' => 'Château Black'
            ], [
                'nombre' => 'Château Special B'
            ], [
                'nombre' => 'Castle Crystal'
            ]]);

        Malteria::byNombre('American')
            ->maltas()->create([
                'nombre' => 'Pale 2-Row'
            ]);
    }
}
