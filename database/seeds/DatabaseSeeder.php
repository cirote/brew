<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(LupulosTableSeeder::class);

        $this->call(MalteriasTableSeeder::class);
        $this->call(MaltasTableSeeder::class);

        $this->call(LaboratoriosTableSeeder::class);
        $this->call(LevadurasTableSeeder::class);

        $this->call(RecetasTableSeeder::class);
        $this->call(LotesTableSeeder::class);
    }
}
