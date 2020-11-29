<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OllasTableSeeder::class);
        $this->call(FermentadoresTableSeeder::class);
        $this->call(TipoEnvasesTableSeeder::class);

        $this->call(LupulosTableSeeder::class);

        $this->call(MalteriasTableSeeder::class);
        $this->call(MaltasTableSeeder::class);

        $this->call(LaboratoriosTableSeeder::class);
        $this->call(LevadurasTableSeeder::class);

        $this->call(RecetasTableSeeder::class);

//        $this->call(LotesTableSeeder::class);
        $this->call(cerveza_de_marzo::class);
        $this->call(triple_blond::class);
        $this->call(trigo::class);
        $this->call(stout::class);
        $this->call(lager::class);
	    $this->call(pilsener_czech::class);
        $this->call(sahti::class);
    }
}
